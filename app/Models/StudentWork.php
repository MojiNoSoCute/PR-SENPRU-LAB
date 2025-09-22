<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    protected $primaryKey = 'work_id';
    
    protected $fillable = [
        'program_id',
        'title_th',
        'title_en',
        'description_th',
        'description_en',
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }
    
    public function media()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
