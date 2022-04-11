<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;

class CitiesImport implements ToModel
{
    public function  __construct($country_id)
    {
        $this->country_id= $country_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new City([
            'name' => $row[0],
            'country_id' => $this->country_id
        ]);
    }
}
