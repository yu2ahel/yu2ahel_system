<?php

namespace App\Rules;

use App\Models\Room;
use App\Models\ServiceSchedule;
use App\Models\ServiceType;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScheduleDateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // $room = Request()->input('room_id');
        // $serviceType = Request()->input('service_type_id');
        // $serviceProvider = Request()->input('service_provider_id');

        // $service_schedule = ServiceSchedule::selectRaw('service_schedule.service_provider_id as service_provider , COUNT(*) as count , ANY_VALUE(rooms.room_capacity) as capacity')
        // ->leftJoin('service_types', 'service_types.id', '=', 'service_schedule.service_type_id')
        // ->leftJoin('rooms', 'rooms.id', '=', 'service_schedule.room_id')
        // ->where('service_schedule.room_id',$room)
        // ->whereBetween('service_schedule.date_time', [$value, 'date_add('.$value.',interval service_types.average_time_in_minutes)'])
        // ->groupBy('service_schedule.service_provider_id')
        // ->get()->toArray();

        // log::debug($service_schedule);
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
