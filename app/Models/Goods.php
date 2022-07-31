<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Goods\Enums\GoodsType;
use Illuminate\Support\Facades\DB;
use App\Shop\V1\Goods\GoodsManager;

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
        
        $sortpos = DB::table('goods_ref_options')->selectRaw('COUNT(*) as count')->whereGoodsId($this->id)->value('count');
        
        $this->options()->attach($optionId, [
            'sortpos' => $sortpos,
            'own_user_id' => $option->user_id,
            'set_user_id' => $userId
        ]); 
    }
    
    public function getOptionsWithGroups()
    {
        return (new GoodsManager($this))->makeOptionGroups();
    }
}
