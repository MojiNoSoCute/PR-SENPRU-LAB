<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class PublicController extends Controller
{
    public function index()
    {
        $program = Program::first();
        $updatedAt = $program?->updated_at;

        // Fetch related data
        $activities = $program ? $program->activities()->orderBy('activity_date', 'desc')->get() : collect();
        $facultyMembers = $program ? $program->facultyMembers()->get() : collect();
        $careerOpportunities = $program ? $program->careerOpportunities()->get() : collect();
        $laboratories = $program ? $program->laboratories()->get() : collect();
        $studentWorks = $program ? $program->studentWorks()->get() : collect();
        $alumni = $program ? $program->alumni()->get() : collect();
        $videos = $program ? $program->videos()->get() : collect();
        
        // Get featured video
        $featuredVideo = $program ? $program->videos()->where('is_featured', true)->first() : null;

        return view('index', compact(
            'program', 
            'updatedAt',
            'activities',
            'facultyMembers',
            'careerOpportunities',
            'laboratories',
            'studentWorks',
            'alumni',
            'videos',
            'featuredVideo'
        ));
    }
}
