<?php
use Illuminate\Database\Seeder;
use App\Excity;
class CitySeeder extends Seeder {

    public function run()
    {

        $fileName="ex_cities.dat";
        $file = database_path('data/'.$fileName);
        $fp = fopen($file, "r");
        $data=array();
        while(! feof($fp))
        {
            $dataLine=explode(",",str_replace("\n","",fgets($fp)));
            array_push($data, array('id' => $dataLine[0],'city' => $dataLine[1]));
        }
        fclose($fp);
        Excity::insert($data);
    }

}
