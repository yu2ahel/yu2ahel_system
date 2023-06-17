<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\BaseRepository;

/**
 * Class roomsRepository
 * @package App\Repositories
 * @version January 15, 2022, 3:40 pm UTC
*/

class roomsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_name',
        'room_capacity',
        'branch_id'
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
        return Room::class;
    }
}
