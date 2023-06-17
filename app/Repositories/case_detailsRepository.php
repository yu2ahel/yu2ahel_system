<?php

namespace App\Repositories;

use App\Models\CaseDetail;
use App\Repositories\BaseRepository;

/**
 * Class case_detailsRepository
 * @package App\Repositories
 * @version January 18, 2022, 8:04 pm UTC
*/

class case_detailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'beneficiary_id',
        'last_diagnosis',
        'initial_diagnosis',
        'family_social_status',
        'father_occupation',
        'mother_occupation',
        'escorter_name',
        'notes'
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
        return CaseDetail::class;
    }
}
