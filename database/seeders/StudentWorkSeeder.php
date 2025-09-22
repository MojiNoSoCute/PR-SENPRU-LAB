<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\StudentWork;

class StudentWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if ($program) {
            $program->studentWorks()->createMany([
                [
                    'title_th' => 'ระบบจัดการข้อมูลนักศึกษา',
                    'title_en' => 'Student Information Management System',
                    'description_th' => 'โปรเจกต์จบการศึกษาที่พัฒนาเป็นระบบเว็บสำหรับจัดการข้อมูลนักศึกษา อาจารย์ และรายวิชา',
                    'description_en' => 'Graduation project developed as a web system for managing student, faculty, and course information'
                ],
                [
                    'title_th' => 'แอปพลิเคชันติดตามสุขภาพ',
                    'title_en' => 'Health Tracking Application',
                    'description_th' => 'แอปพลิเคชันมือถือสำหรับติดตามสุขภาพและกิจกรรมประจำวันของผู้ใช้',
                    'description_en' => 'Mobile application for tracking user health and daily activities'
                ]
            ]);
        }
    }
}
