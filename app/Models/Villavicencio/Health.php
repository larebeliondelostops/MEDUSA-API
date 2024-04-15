<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'health';

    private $slug = 'health';

    protected $guarded = [];
    
    private function pointPropertiesToShow()
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'emergency_patients' => $this->emergency_patients,
            'emergency_beds_available' => $this->emergency_beds_available,
            'available_operating_rooms' => $this->available_operating_rooms,
            'intensive_care_unit_available' => $this->intensive_care_unit_available,
            'first_level_beds' => $this->first_level_beds,  
            'second_level_beds' => $this->second_level_beds,
            'third_level_beds' => $this->third_level_beds,
            'blood_bank' => $this->blood_bank,
            'doctors_in_the_shift' => $this->doctors_in_the_shift,
            'nurses_in_the_shift' => $this->nurses_in_the_shift,
            'affiliated_ips' => $this->affiliated_ips,
            'number_of_emergencies_day' => $this->number_of_emergencies_day,
        ];
    }
    private function pointProperties()
    {
        return [];
    }
}
