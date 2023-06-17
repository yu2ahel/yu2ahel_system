<?php

namespace App\Repositories;

use App\Models\ServiceSchedule;
use App\Repositories\BaseRepository;

/**
 * Class service_scheduleRepository
 * @package App\Repositories
 * @version January 18, 2022, 8:17 pm UTC
*/

class service_scheduleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'beneficiary_id',
        'service_provider_id',
        'branch_id',
        'service_type_id',
        'department_id',
        'room_id',
        'date_time',
        'accounting_type',
        'base_fees',
        'extra_fees',
        'extra_fees_note',
        'total_fees'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceSchedule::class;
    }
}
