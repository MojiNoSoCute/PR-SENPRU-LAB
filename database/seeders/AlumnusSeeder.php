<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Alumnus;

class AlumnusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = Program::first();
        
        if ($program) {
            $program->alumni()->createMany([
                [
                    'name_th' => 'นางสาวกนกวรรณ สุขสบาย',
                    'name_en' => 'Ms. Kanokwan Sukasabai',
                    'position_th' => 'หัวหน้าทีมนักพัฒนา',
                    'position_en' => 'Development Team Lead',
                    'company_th' => 'บริษัทเทคโนโลยีไทย',
                    'company_en' => 'Thai Technology Co., Ltd.',
                    'biography_th' => 'ทำงานในตำแหน่งหัวหน้าทีมนักพัฒนา รับผิดชอบการพัฒนาแอปพลิเคชันระดับองค์กร',
                    'biography_en' => 'Working as Development Team Lead, responsible for enterprise application development'
                ],
                [
                    'name_th' => 'นายสุรชัย พัฒน์ธนกุล',
                    'name_en' => 'Mr. Surachai Pattanakul',
                    'position_th' => 'ผู้จัดการโครงการ',
                    'position_en' => 'Project Manager',
                    'company_th' => 'บริษัทซอฟต์แวร์นานาชาติ',
                    'company_en' => 'International Software Co., Ltd.',
                    'biography_th' => 'ทำงานด้านการจัดการโครงการซอฟต์แวร์ในบริษัทซอฟต์แวร์ชั้นนำของประเทศ',
                    'biography_en' => 'Working in software project management at a leading software company in the country'
                ]
            ]);
        }
    }
}
