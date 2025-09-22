<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    protected $primaryKey = 'faculty_id';
    
    protected $fillable = [
        'program_id',
        'name_th',
        'name_en',
        'position_th',
        'position_en',
        'email',
        'phone',
        'biography_th',
        'biography_en',
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }
    
    public function research()
    {
        return $this->hasMany(FacultyResearch::class, 'faculty_id', 'faculty_id');
    }
    
    public function media()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
