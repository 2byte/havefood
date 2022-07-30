<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;

class Goods extends Model
{
    use HasFactory;
    
    public $table = 'goods';
    public $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'price',
        'sticker',
        'count_photos',
        'goods_type',
        'hidden'
    ];
    
    protected $casts = [ 'goods_type' => GoodsType::class ];
    
    public function options()
    {
        return $this->belongsToMany(GoodsOption::class, 'goods_ref_options', 'goods_id', 'option_id')->withTimestamps();
    }
}
