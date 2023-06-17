<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ServiceSchedule;
use App\Rules\ScheduleDateRule;

class Createservice_scheduleRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return ServiceSchedule::$rules;
        return [
            'beneficiary_id' => 'required',
            'service_provider_id' => 'required',
            'branch_id' => 'required',
            'service_type_id' => 'required|not_in:0',
            'department_id' => 'required',
            'room_id' => 'required',
            // 'date_time' => ['required', 'string' , new ],
            'date_time' => ['required', new ScheduleDateRule],
            'accounting_type' => 'required',
            'base_fees' => 'required',
            // 'extra_fees' => 'required',
            // 'extra_fees_note' => 'required',
            'repeat' => 'required',
            'total_fees' => 'required'
        ];
    }
}
