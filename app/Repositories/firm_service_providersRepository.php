<?php

namespace App\Repositories;

use App\Models\FirmServiceProvider;
use App\Repositories\BaseRepository;

/**
 * Class firm_service_providersRepository
 * @package App\Repositories
 * @version January 18, 2022, 1:40 pm UTC
*/

class firm_service_providersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'job_title',
        'basic_salary',
        'default_services_percentage',
        'date_of_registration',
        'firm_id'
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
        return FirmServiceProvider::class;
    }
}
