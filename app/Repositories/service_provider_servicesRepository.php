<?php

namespace App\Repositories;

use App\Models\ServiceProviderService;
use App\Repositories\BaseRepository;

/**
 * Class service_provider_servicesRepository
 * @package App\Repositories
 * @version January 18, 2022, 5:52 pm UTC
*/

class service_provider_servicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firm_id',
        'department_id',
        'service_type_id',
        'service_provider_id',
        'service_provider_percentage',
        'price_regular',
        'price_urgent',
        'price_discount',
        'is_free_accepted'
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
        return ServiceProviderService::class;
    }
}
