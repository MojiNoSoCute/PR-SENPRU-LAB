<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $primaryKey = 'lab_id';
    
    protected $fillable = [
        'program_id',
        'name_th',
        'name_en',
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
