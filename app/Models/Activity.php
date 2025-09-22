<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $primaryKey = 'activity_id';
    
    protected $fillable = [
        'program_id',
        'title_th',
        'description_th',
        'activity_date',
    ];
    
    protected $casts = [
        'activity_date' => 'date',
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
