<?php 

namespace App\Http\Request\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bpin' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'ocad' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'substate' => 'required|string|max:255',
            'total_value' => 'required|numeric',
            'requested_value' => 'required|numeric',
            'executed_value' => 'required|numeric',
            'physical_progress' => 'required|numeric|between:0,100',
            'responsible_entity' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'beneficiaries' => 'required|integer',
            'planner' => 'required|string|max:255',
            'execution_approval_date' => 'required|date',
            'completion_date' => 'nullable|date|after_or_equal:execution_approval_date',
            'start_date_execution_phase' => 'nullable|date',
            'project_duration_in_months' => 'required|integer|min:0',
            'reporting_frequency' => 'required|integer|min:1',
            'general_objective' => 'required|string|max:1000',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Error in the required parameters.',
        ], 400));
    }
}
