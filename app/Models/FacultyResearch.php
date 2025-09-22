<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyResearch extends Model
{
    protected $primaryKey = 'research_id';
    
    protected $fillable = [
        'faculty_id',
        'title_th',
        'title_en',
        'description_th',
        'description_en',
        'publication_date',
    ];
    
    protected $casts = [
        'publication_date' => 'date',
    ];
    
    public function facultyMember()
    {
        return $this->belongsTo(FacultyMember::class, 'faculty_id', 'faculty_id');
    }
}
