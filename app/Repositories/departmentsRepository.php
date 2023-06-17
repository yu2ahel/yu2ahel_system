<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\BaseRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;


/**
 * Class departmentsRepository
 * @package App\Repositories
 * @version January 18, 2022, 12:56 pm UTC
*/

class departmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'brief',
        'description',
        'photo',
        'firm_id',
        'supervisor_id'
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
        return Department::class;
    }
    public function createDepartment(Request $request)
    {
        $file = $request->file('photo');
        $originalName = $file->getClientOriginalName();
        $extention = $file->getClientOriginalExtension();
        $path = 'upload\\' . uniqid() . '.' . $extention;
        $img = Image::make($file);
        if (!file_exists(public_path('upload'))) {
            mkdir(public_path($path), 666, true);
        }
        $img->save(public_path($path));
        $input = $request->all();
        $input['photo'] = $path;
        return $this->create($input);

    }
}
