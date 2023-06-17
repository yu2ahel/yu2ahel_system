<?php

namespace App\Repositories;

use App\Models\FirmBranch;
use App\Repositories\BaseRepository;

/**
 * Class firm_branchesRepository
 * @package App\Repositories
 * @version January 13, 2022, 11:20 pm UTC
*/

class firm_branchesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'working_hours',
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
        return FirmBranch::class;
    }
}
