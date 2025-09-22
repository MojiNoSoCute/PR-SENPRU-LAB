<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\FacultyMember;

class FacultyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if ($program) {
            $program->facultyMembers()->createMany([
                [
                    'name_th' => 'ดร.สมชาย ใจดี',
                    'name_en' => 'Dr. Somchai Jaidee',
                    'position_th' => 'หัวหน้าสาขา',
                    'position_en' => 'Head of Department',
                    'email' => 'somchai@example.com',
                    'phone' => '02-123-4567',
                    'biography_th' => 'จบปริญญาเอกจากมหาวิทยาลัยชั้นนำด้านวิศวกรรมซอฟต์แวร์ มีประสบการณ์ในการสอนและการวิจัยมากกว่า 10 ปี',
                    'biography_en' => 'PhD graduate from a leading university in software engineering with over 10 years of teaching and research experience'
                ],
                [
                    'name_th' => 'ผศ.สุนทรี แสงอรุณ',
                    'name_en' => 'Asst. Prof. Suntree Saengarun',
                    'position_th' => 'อาจารย์',
                    'position_en' => 'Assistant Professor',
                    'email' => 'suntree@example.com',
                    'phone' => '02-123-4568',
                    'biography_th' => 'เชี่ยวชาญด้านการพัฒนาเว็บและโมบายล์แอปพลิเคชัน มีผลงานวิจัยตีพิมพ์ในวารสารวิชาการระดับนานาชาติ',
                    'biography_en' => 'Expert in web and mobile application development with publications in international academic journals'
                ]
            ]);
        }
    }
}
