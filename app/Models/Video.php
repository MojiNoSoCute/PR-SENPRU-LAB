<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey = 'video_id';
    
    protected $fillable = [
        'program_id',
        'title_th',
        'title_en',
        'description_th',
        'description_en',
        'url',
        'is_featured',
    ];
    
    protected $casts = [
        'is_featured' => 'boolean',
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }
}
