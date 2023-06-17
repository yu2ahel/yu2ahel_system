<?php

namespace App\Repositories;

use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version February 11, 2022, 11:26 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'password_confirmation',
        'type'
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
        return User::class;
    }

    public function hashPassword($input)
    {
        $input['password'] = Hash::make($input['password']);
        $input['password_confirmation'] = Hash::make($input['password_confirmation']);
        return $input;
    }
}
