<?php

use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccines')->insert([
        	['name'=>'BCG', 'origin'=>'Việt Nam', 'allocate'=>'Phòng bệnh lao', 'late_price'=>'125000'],
        	['name'=>'ENGERIX B', 'origin'=>'Bỉ', 'allocate'=>'Viêm gan B', 'late_price'=>'215000'],
        	['name'=>'HAVAX', 'origin'=>'Việt Nam', 'allocate'=>'Viêm gan A', 'late_price'=>'230000'],
        	['name'=>'ROTARIX', 'origin'=>'Bỉ', 'allocate'=>'Dịch tả ROTA virus', 'late_price'=>'805000'],
        	['name'=>'MMR II', 'origin'=>'Mỹ', 'allocate'=>'Sởi - Quai bị -Rubella', 'late_price'=>'240000'],
        	['name'=>'MVAC', 'origin'=>'Mỹ', 'allocate'=>'Sở đơn', 'late_price'=>'300000'],
        	['name'=>'PENTAXIM', 'origin'=>'Pháp', 'allocate'=>'Bạch hầu - Ho gà - Uốn ván', 'late_price'=>'750000'],
        	['name'=>'IMOJEV', 'origin'=>'Thái Lan', 'allocate'=>'Viêm não Nhật Bản', 'late_price'=>'670000'],
        	['name'=>'VARIVAX', 'origin'=>'Mỹ', 'allocate'=>'Thủy đậu', 'late_price'=>'820000'],
        	['name'=>'VERORAB', 'origin'=>'Pháp', 'allocate'=>'Phòng dại', 'late_price'=>'290000']
    	]);
    }
}
