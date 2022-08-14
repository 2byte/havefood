<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Shop\Enums\FiletypeEnum;

class File extends Model
{
    use HasFactory;
    
    public $fillable = [
      'user_id',
      'relate_id',
      'relate_type',
      'filename',
      'type',
      'size_img_x',
      'size_img_y',
      'filesize',
      'sortpos',
    ];
    
    public $casts = [
      'type' => FiletypeEnum::class
    ];
    
    public function relate()
    {
      return $this->morphTo();
    }
}
