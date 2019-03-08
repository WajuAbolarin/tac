<?php

use Illuminate\Database\Seeder;
use App\{Area, District, Assembly};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $data = include( dirname(dirname( __DIR__)) . '/app/assemblies.php' );

        $data = collect($data);

        foreach ($data as $area => $districts) {

            $areaModel = Area::create(['name' => $area]);

            foreach ($districts as $district => $assemblies) {

                $districtModel =  District::create(['name' => $district, 'area_id' => $areaModel->id]);

                foreach ($assemblies as $assembly) {

                    Assembly::create(['name' => $assembly, 'district_id' => $districtModel->id ]);
                }
            }
        }
    }
}
