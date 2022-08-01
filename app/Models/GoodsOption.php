<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use App\Shop\Goods\Enums\GoodsOptionPriceType;
use App\Shop\Goods\Enums\GoodsOptionGroupType;

class GoodsOption extends Model
{
    use HasFactory;
    
    public $table = 'goods_options';
    
    public $fillable = [
        'user_id',
        'parent_id',
        'group',
        'group_variant',
        'name',
        'description',
        'note',
        'goods_type',
        'price',
        'price_type',
        'sortpos',
        'count_photos',
        'default',
        'hidden',
    ];
    
    protected $casts = [ 
        'goods_type' => GoodsType::class,
        'price_type' => GoodsOptionPriceType::class,
        'group_type' => GoodsOptionGroupType::class,
    ];
    
    public function goods()
    {
        return $this->belongsToMany(Goods::class, 'goods_ref_options', 'option_id', 'goods_id')->withTimestamps();
    }
    
    public function optionChilds()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
