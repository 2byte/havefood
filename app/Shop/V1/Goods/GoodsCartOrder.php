<?php

namespace App\Shop\V1\Goods;

use App\Models\{
    Goods,
    GoodsOption
};

class GoodsCartOrder {

    function __construct()
    {

    }

    public static function make($cartData, $buyer): array
    {
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

        return [
            'goods' => $goodsWithOptions,
            'meta'  => $meta,
            'buyer' => $buyer,
        ];
    }
}
