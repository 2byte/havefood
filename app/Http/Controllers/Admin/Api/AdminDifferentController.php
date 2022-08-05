<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Shop\Goods\Enums\GoodsType;

class AdminDifferentController extends AdminBaseController
{
    //
    public function getGoodsTypes()
    {
        return responseApi(
            GoodsType::valuesToRu()
        )->success();
    }
}
