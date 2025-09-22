<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerOpportunity extends Model
{
    protected $primaryKey = 'opportunity_id';
    
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
}
