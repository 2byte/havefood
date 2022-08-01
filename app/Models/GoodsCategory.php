<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;

class GoodsCategory extends Model
{
    use HasFactory;
    
    public $table = 'goods_categories';
    public $guarded = [];
    
    protected $casts = [ 'goods_type' => GoodsType::class ];
    
    public static function getList()
    {
        return static::query()->orderyBy('sortpos', 'asc')->get();
    }
}
