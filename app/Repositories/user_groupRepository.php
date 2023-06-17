<?php

namespace App\Repositories;

use App\Models\UserGroup;
use App\Repositories\BaseRepository;

/**
 * Class user_groupRepository
 * @package App\Repositories
 * @version January 13, 2022, 5:17 pm UTC
*/

class user_groupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return UserGroup::class;
    }
}
