<?php

namespace App\Http\Controllers;

use App\Mail\{
    OrderShippedAdmin,
    OrderShippedUser
};
use App\Shop\V1\Goods\GoodsCartOrder;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsCategory;
use Inertia\Inertia;
use Mail;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $goods = Goods::getList($request->input('category_id'));

        $categories = getGoodsCategories();

        $goods->appends($request->only('category_id'));

        $tplData = [
            'goods' => $goods,
            'categories' => $categories
        ];

        return view('index', $tplData);
    }

    /**
     * Test page modal for Goods view
     **/
    public function goodsView(Request $request)
    {

        $goods = Goods::with('previews', 'options.files')->find($request->id);

        $goods->makeOptionTreeAttribute();

        return view('goods.modal_view_goods', compact('goods'));
    }

    public function goodsOrder(Request $request)
    {
        return Inertia::render('GoodsOrder', [
            'success' => $request->session()->has('success'),
        ]);
    }

    public function goodsOrderStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required|email',
            'phone' =>'required',
            'address' =>'required',
            'notes' =>'max:255',
        ]);

        $goodsCartOrder = GoodsCartOrder::make(session('cart'), $request->all());

        Mail::to(config('mail.from.address'))->send(
            new OrderShippedAdmin($goodsCartOrder)
        );
        Mail::to($request->email)->send(
            new OrderShippedUser($goodsCartOrder)
        );

        session()->forget('cart');

        return back()->with('success', 'Заказ успешно размещен');
    }
}
