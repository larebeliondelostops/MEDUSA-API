<?php

namespace App\Http\Request\Modules\hackathon;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
    public function rules() : array
    {
        return [
            'indicator' => 'required|integer',
            'address' => 'sometimes|string',
            'description' => 'sometimes|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric', 
            'day' => 'required|string',
            'month' => 'required|string',
            'year' => 'required|string',
            'image' => 'required|image',
            'hour_24' => 'sometimes|string',
            'crime' => 'sometimes|string',
            'week' => 'sometimes|string',
            'zone' => 'sometimes|string',
            'modality' => 'sometimes|string',
            'date' => 'sometimes|string',
        ];
    }
}