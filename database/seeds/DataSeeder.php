<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'=> Company::first()->id,
            'address'   => 'Calle 148 N°2172 (ex Moreno 730) Villa Ballester.',
            'email'     => 'andrescastrodevia@gmail.com',
            'phone1'    => '+5491147383753|(011) 4738-3753 / 6679 ',
            'phone2'    => '+5491147383753|11 4738-3753',
            'phone3'    => '+5491140884334|+54 9 11 4088 4334',
            'logo_header'=> 'images/data/logo_header.svg',
            'logo_footer'=> 'images/data/logo_footer.svg'
        ]);
        
    }
}
