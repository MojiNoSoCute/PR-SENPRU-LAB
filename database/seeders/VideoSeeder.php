<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();

        if ($program) {
            $program->videos()->createMany([
                [
                    'title_th' => 'แนะนำหลักสูตรวิศวกรรมซอฟต์แวร์',
                    'title_en' => 'Introduction to Software Engineering Program',
                    'description_th' => 'วิดีโอแนะนำหลักสูตรและการเรียนการสอนในสาขาวิชาวิศวกรรมซอฟต์แวร์',
                    'url' => 'https://www.youtube.com/embed/M1F81V-NhP0',
                    'is_featured' => true
                ],
                [
                    'title_th' => 'กิจกรรมของนักศึกษา',
                    'title_en' => 'Student Activities',
                    'description_th' => 'วิดีโอสรุปกิจกรรมของนักศึกษาในคณะวิศวกรรมซอฟต์แวร์',
                    'url' => 'https://www.youtube.com/embed/2JVpe3OGOGo',
                    'is_featured' => false
                ]
            ]);
        }
    }
}
