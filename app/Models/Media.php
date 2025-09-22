<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $primaryKey = 'media_id';
    
    protected $fillable = [
        'mediaable_id',
        'mediaable_type',
        'file_path',
        'file_type',
        'is_cover',
    ];
    
    protected $casts = [
        'is_cover' => 'boolean',
    ];
    
    public function mediaable()
    {
        return $this->morphTo();
    }
}
