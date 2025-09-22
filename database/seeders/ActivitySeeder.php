<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if ($program) {
            $program->activities()->createMany([
                [
                    'title_th' => 'โครงการแนะแนวระดับมัธยมศึกษา',
                    'description_th' => 'กิจกรรมแนะแนวสำหรับนักเรียนระดับมัธยมศึกษาที่สนใจศึกษาต่อในสาขาวิชาวิศวกรรมซอฟต์แวร์',
                    'activity_date' => '2025-03-15',
                ],
                [
                    'title_th' => 'งานวันเปิดบ้านคณะ',
                    'description_th' => 'กิจกรรมเปิดบ้านให้นักเรียนและผู้ปกครองได้เข้าชมสภาพแวดล้อมของคณะและหลักสูตร',
                    'activity_date' => '2025-07-20',
                ],
                [
                    'title_th' => 'แข่งขันพัฒนาแอปพลิเคชัน',
                    'description_th' => 'การแข่งขันพัฒนาแอปพลิเคชันสำหรับนักศึกษาภายในคณะ ร่วมกับบริษัทเทคโนโลยีชั้นนำ',
                    'activity_date' => '2025-05-10',
                ],
            ]);
        }
    }
}
