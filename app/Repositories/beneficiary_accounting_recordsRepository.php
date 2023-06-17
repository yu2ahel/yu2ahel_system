<?php

namespace App\Repositories;

use App\Models\BeneficiaryAccountingRecord;
use App\Repositories\BaseRepository;

/**
 * Class beneficiary_accounting_recordsRepository
 * @package App\Repositories
 * @version January 18, 2022, 8:22 pm UTC
*/

class beneficiary_accounting_recordsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'beneficiary_id',
        'transaction_type',
        'amount'
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
        return BeneficiaryAccountingRecord::class;
    }
}
