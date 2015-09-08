<?php

use Illuminate\Database\Seeder;
use App\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type=array(
        	array('type'=>'寻物启事'),
        	array('type'=>'失物招领'),
        	array('type'=>'寻人启事'),
        	array('type'=>'寻宠启事'),
        );
        Type::insert($type);
    }
}
