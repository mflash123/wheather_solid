<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Dnsimmons\OpenWeather\OpenWeather;
use App\Models\Country;
use App\Models\City;
use App\Models\WheatherDay;
use App\Models\WheatherHour;

class GetRussiaOnly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:russia';

    protected $units = 'metric';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting country and cities forecasts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $country = Country::where('name','Russia')->first();


        $country->cities->each(function($city){
           

            // echo($city->id);
            // echo "\n";
            // echo($city->name);
            // echo "\n";
            // echo "\n";

            if($city->id==51571){
                //moscow
                $weather = new OpenWeather();
                $current = $weather->getForecastWeatherByCityName('Moscow,RU',$this->units);


                foreach ($current['forecast'] as $forecast) {
                    $day = WheatherDay::firstOrCreate(
                        [
                            'city_id' => $city->id,
                            'date' => $forecast['datetime']['formatted_date']
                        ],
                        ['date' => $forecast['datetime']['formatted_date'] ],
                    );

                    /**
                     * "formatted_time" => "21:00"
                     * "formatted_sunrise" => "05:11"
                     * "formatted_sunset" => "13:18"
                     */

                    WheatherHour::firstOrCreate(
                        [
                            'day_id' => $day->id,
                            'time' => $forecast['datetime']['formatted_time'], 
                        ],
                        [
                            'forecast' => json_encode($forecast)
                        ],
                    );

                }
            }
        });
       // dd($res);
        //print($country->cities());
        // $weather = new OpenWeather();
        // $current = $weather->getForecastWeatherByCityName('Moscow,US','metric');
        // dump($current);

       // return Command::SUCCESS;
    }
}
