<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FacultyMember;
use App\Models\FacultyResearch;

class FacultyResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facultyMember = FacultyMember::first();
        
        if ($facultyMember) {
            $facultyMember->research()->createMany([
                [
                    'title_th' => 'การพัฒนาระบบแนะนำการเรียนรู้ด้วยปัญญาประดิษฐ์',
                    'title_en' => 'Development of AI-based Learning Recommendation System',
                    'description_th' => 'การวิจัยเกี่ยวกับการใช้ปัญญาประดิษฐ์ในการแนะนำเส้นทางการเรียนรู้สำหรับนักศึกษา',
                    'description_en' => 'Research on using artificial intelligence to recommend learning paths for students',
                    'publication_date' => '2025-01-15'
                ],
                [
                    'title_th' => 'การวิเคราะห์ข้อมูลขนาดใหญ่ในระบบคลาวด์',
                    'title_en' => 'Big Data Analysis in Cloud Systems',
                    'description_th' => 'การศึกษาวิธีการวิเคราะห์ข้อมูลขนาดใหญ่โดยใช้เทคโนโลยีคลาวด์คอมพิวติ้ง',
                    'description_en' => 'Study of methods for analyzing big data using cloud computing technology',
                    'publication_date' => '2024-11-20'
                ]
            ]);
        }
    }
}
