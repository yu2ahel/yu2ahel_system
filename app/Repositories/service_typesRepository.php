<?php

namespace App\Repositories;

use App\Models\ServiceType;
use App\Repositories\BaseRepository;

/**
 * Class service_typesRepository
 * @package App\Repositories
 * @version January 15, 2022, 2:17 pm UTC
*/

class service_typesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'average_time_in_minutes',
        'default_price_regular',
        'default_price_urgent',
        'default_price_discount',
        'is_freeable',
        'service_id'
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
        return ServiceType::class;
    }
}
