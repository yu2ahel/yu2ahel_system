<?php

namespace App\Repositories;

use App\Models\Beneficiary;
use App\Models\FirmBeneficiary;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class beneficiariesRepository
 * @package App\Repositories
 * @version January 18, 2022, 7:07 pm UTC
*/

class beneficiariesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'type',
        'date_of_birth',
        'transferred_from',
        'about',
        'degree',
        'occupation'
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
        return Beneficiary::class;
    }
    public function createFirmBeneficiary(Request $request,$beneficiaries)
    {
        $input = $request->all();
        $firm_beneficiaries = new FirmBeneficiary;
        $firm_beneficiaries->firm_id = $input['firm_id'];
        $firm_beneficiaries->branch_id = $input['branch_id'];
        $firm_beneficiaries->beneficiary_id = $beneficiaries->id;
        $firm_beneficiaries->supervisor_id = $input['supervisor_id'];
        $firm_beneficiaries->registration_date = $input['registration_date'];
        $firm_beneficiaries->status = $input['status'];
        $firm_beneficiaries->save();
    }
    public function updateFirmBeneficiary(Request $request,$id)
    {
        $input = $request->all();
        $beneficiaries = FirmBeneficiary::where('beneficiary_id',$id)->first();
        $beneficiaries->firm_id = $input['firm_id'];
        $beneficiaries->branch_id = $input['branch_id'];
        $beneficiaries->supervisor_id = $input['supervisor_id'];
        $beneficiaries->registration_date = $input['registration_date'];
        $beneficiaries->status = $input['status'];
        $beneficiaries->save();
    }
}
