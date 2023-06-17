<?php

namespace App\Repositories;

use App\Models\Firm;
use App\Repositories\BaseRepository;

/**
 * Class firmsRepository
 * @package App\Repositories
 * @version January 13, 2022, 10:55 pm UTC
*/

class firmsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'en_name',
        'ar_name',
        'ar_about_firm',
        'en_about_firm',
        'date_of_establishment',
        'tax_register_no',
        'commercial_register_no',
        'firm_classification',
        'main_branch_address',
        'main_branch_city_id'
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
        return Firm::class;
    }
}
