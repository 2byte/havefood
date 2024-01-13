<?php

namespace App\Http\Controllers;

use App\Models\GoodsOption;
use Illuminate\Http\Request;
use App\Models\Goods;
use Illuminate\Support\Facades\Blade;

class AjaxController extends Controller
{
    //
    public function index(Request $request)
    {

        $tplData = [];

        return view('index', $tplData);
    }

    public function getGoodsHtmlBodyModal(Request $request)
    {
        $id = $request->id;

        $goods = Goods::with('previews', 'options.files')->findOrFail($id);

        $goods->makeOptionTreeAttribute();

        $returnData = [
            'goods' => $goods->getAttributes(),
            'options' => $goods->options,
            'modal_body' => Blade::render('goods.modal_view_goods', compact('goods'))
        ];

        return responseApi($returnData)->success();
    }

    public function postGoodsAddCart(Request $request)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'options' => 'array',
            'count' => 'required|numeric|min:1',
            'total_amount' => 'required|numeric|min:1'
        ]);

        session()->push('cart', $request->all());

        return responseApi()->success();
    }

    public function getCart(Request $request)
    {
        $cartData = session('cart');
        $goods = collect($cartData)->map(fn ($item) => Goods::with('previews')->find($item['goods_id']));

        $goodsWithOptions = $goods->map(function ($goodsModel, $index) use($cartData) {
            $goodsModel->setAttribute('preview_of_sizes', $goodsModel->previewSizes);
            $goodsModel->setAttribute('preview_small', $goodsModel->smallPreview);
            $goodsModel->setAttribute('total_amount', $cartData[$index]['total_amount']);
            $goodsModel->setAttribute('count', $cartData[$index]['count']);

            return [
                'goodsData' => $goodsModel,
                'options'   => isset($cartData[$index]['options'])
                    ? collect($cartData[$index]['options'])->map(fn ($option) => GoodsOption::find($option))->toArray()
                    : [],
            ];
        });

        $meta = [];

        if ($goodsWithOptions->isNotEmpty()) {
            $meta['total_amount'] = $goodsWithOptions->sum(fn ($goods) => $goods['goodsData']->total_amount);
        }

        return responseApi()->success([
            'goods' => $goodsWithOptions,
            'meta'  => $meta
        ]);
    }

    public function postRemoveProductCart(Request $request) {
        $request->validate(['id' => 'required|numeric']);

        $cartData = session('cart');

        foreach ($cartData as $key => $item) {
            if ($item['goods_id'] == $request->id) {
                unset($cartData[$key]);
            }
        }

        reset($cartData);

        session()->put('cart', $cartData);

        return responseApi()->success();
    }
}
