<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use Illuminate\Support\Facades\DB;

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
        return $this->belongsToMany(GoodsOption::class, 'goods_ref_options', 'goods_id', 'option_id')
            ->withTimestamps()
            ->withPivot('own_user_id', 'set_user_id', 'sortpos');
    }
    
    public function attachOption(int $optionId,  int $userId)
    {
        $option = GoodsOption::findOrFail($optionId);
        
        $this->options()->attach($optionId, [
            'sortpos' => DB::table('goods_ref_options')->selectRaw('COUNT(*) as count')->whereGoodsId($this->id)->value('count'),
            'own_user_id' => $option->user_id,
            'set_user_id' => $userId
        ]); 
    }
}
