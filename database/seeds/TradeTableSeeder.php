<?php

use Illuminate\Database\Seeder;
use App\Trade;
class TradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $trade=array(
        	array('name'=>'联系'),
        	array('name'=>'交易'),
        	array('name'=>'报酬'),
        );
        Trade::insert($trade);
    }
}
