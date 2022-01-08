<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Country;
use App\Models\City;

class GetCountriesCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:getContryCity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting contries and cities and push them to DB';

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
        $this->info("Getting countries and cities. It takes some time...");
        $response = Http::get('https://countriesnow.space/api/v0.1/countries');
        if($response->failed()){
            $this->error("FAILED");
            return Command::FAILURE;
        }
        $this->info("SUCCESS");

        $this->info("Tryncate...");
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Country::truncate();
            City::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->info("Ends");


        
        foreach ($response->object()->data as $res) {
            $this->info($res->country." :");
            $country = new Country;
            $country->name=$res->country;
            $country->save();

            foreach ($res->cities as $c) {
                $this->info($c." :");
                $city = new City;
                $city->name=$c;
                $city->country_id=$country->id;
                $city->save();
            }
        }

        $this->info("Getting ISO for countries:");
        $response = Http::get('https://countriesnow.space/api/v0.1/countries/iso');
  
        foreach ($response->object()->data as $c) {
            $country = Country::where('name',$c->name)->first();
            if(!$country) continue;
            $country->iso2=$c->Iso2;
            $country->iso3=$c->Iso3;
            $country->save();
        }
        $this->info("Done");
        
        return Command::SUCCESS;
    }
}
