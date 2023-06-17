<?php

namespace App\Repositories;

use App\Models\FirmServiceProvider;
use App\Models\ServiceProvider;
use App\Repositories\BaseRepository;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class service_providersRepository
 * @package App\Repositories
 * @version January 15, 2022, 4:56 pm UTC
*/

class service_providersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'photo',
        'id_number',
        'id_type',
        'gender',
        'about',
        'user_type_id'
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
        return ServiceProvider::class;
    }
    public function createServiceProvidor(Request $request)
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

        $user = $this->createUser($request);
        $input['user_id'] = $user->id;
        return $this->create($input);
    }

    public function updateImage(Request $request)
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
        return $input;
    }

    public function createFirmServiceProvidor(Request $request,$serviceProviders)
    {
        $input = $request->all();
        $formserviceprovidor = new FirmServiceProvider;
        $formserviceprovidor->job_title = $input['job_title'];
        $formserviceprovidor->firm_id = $input['firm_id'];
        $formserviceprovidor->basic_salary = $input['basic_salary'];
        $formserviceprovidor->default_services_percentage = $input['default_services_percentage'];
        $formserviceprovidor->date_of_registration = $input['date_of_registration'];
        $formserviceprovidor->user_type_id = $input['user_type_id'];
        $formserviceprovidor->service_provider_id = $serviceProviders->id;
        $formserviceprovidor->save();

    }
    public function updateFirmServiceProvidor(Request $request,$id)
    {
        $input = $request->all();
        $formserviceprovidor = FirmServiceProvider::where('service_provider_id',$id)->first();
        $formserviceprovidor->job_title = $input['job_title'];
        $formserviceprovidor->firm_id = $input['firm_id'];
        $formserviceprovidor->basic_salary = $input['basic_salary'];
        $formserviceprovidor->default_services_percentage = $input['default_services_percentage'];
        $formserviceprovidor->date_of_registration = $input['date_of_registration'];
        $formserviceprovidor->user_type_id = $input['user_type_id'];
        $formserviceprovidor->save();

    }

    public function createUser(Request $request)
    {
        $input = $request->all();
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->type = User::TYPE_FIRM_USER;
        $user->save();
        return $user ;
    }

    public function updateUser(Request $request , $id)
    {
        $input = $request->all();
        $user = User::where('id',$id)->first();
        $user->name = $input['name'];
        $user->email = $input['email'];
        if (isset($input['password'])) {
            $user->password = Hash::make($input['password']);
        }
        $user->type = User::TYPE_FIRM_USER;
        $user->save();
        return $user ;
    }


}
