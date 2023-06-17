<?php

namespace App\Repositories;

use App\Models\UserType;
use App\Repositories\BaseRepository;

/**
 * Class user_typeRepository
 * @package App\Repositories
 * @version January 15, 2022, 4:30 pm UTC
*/

class user_typeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'is_dashboard_accesable'
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
        return UserType::class;
    }
}
