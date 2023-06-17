<?php

namespace App\Repositories;

use App\Models\FirmBeneficiary;
use App\Repositories\BaseRepository;

/**
 * Class firm_beneficiariesRepository
 * @package App\Repositories
 * @version January 18, 2022, 7:45 pm UTC
*/

class firm_beneficiariesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firm_id',
        'branch_id',
        'beneficiary_id',
        'supervisor_id',
        'registration_date',
        'status'
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
        return FirmBeneficiary::class;
    }
}
