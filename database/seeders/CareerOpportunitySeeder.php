<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\CareerOpportunity;

class CareerOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if ($program) {
            $program->careerOpportunities()->createMany([
                [
                    'title_th' => 'นักพัฒนาซอฟต์แวร์',
                    'title_en' => 'Software Developer',
                    'description_th' => 'พัฒนาและบำรุงรักษาซอฟต์แวร์ต่างๆ ทั้งในรูปแบบเว็บ โมบายล์ และเดสก์ท็อป',
                    'description_en' => 'Develop and maintain various software including web, mobile, and desktop applications'
                ],
                [
                    'title_th' => 'ผู้ควบคุมโครงการซอฟต์แวร์',
                    'title_en' => 'Software Project Manager',
                    'description_th' => 'วางแผน กำกับ ดูแล และบริหารโครงการพัฒนาซอฟต์แวร์ให้เป็นไปตามกำหนดเวลาและงบประมาณ',
                    'description_en' => 'Plan, supervise, and manage software development projects to meet time and budget constraints'
                ],
                [
                    'title_th' => 'นักวิเคราะห์ระบบ',
                    'title_en' => 'System Analyst',
                    'description_th' => 'วิเคราะห์และออกแบบระบบสารสนเทศให้กับองค์กรต่างๆ',
                    'description_en' => 'Analyze and design information systems for various organizations'
                ]
            ]);
        }
    }
}
