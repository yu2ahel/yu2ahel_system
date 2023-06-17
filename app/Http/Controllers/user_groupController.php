<?php

namespace App\Http\Controllers;

use App\DataTables\user_groupDataTable;
use App\Http\Requests;
use App\Http\Requests\Createuser_groupRequest;
use App\Http\Requests\Updateuser_groupRequest;
use App\Repositories\user_groupRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class user_groupController extends AppBaseController
{
    /** @var  user_groupRepository */
    private $userGroupRepository;

    public function __construct(user_groupRepository $userGroupRepo)
    {
        $this->userGroupRepository = $userGroupRepo;
    }

    /**
     * Display a listing of the user_group.
     *
     * @param user_groupDataTable $userGroupDataTable
     * @return Response
     */
    public function index(user_groupDataTable $userGroupDataTable)
    {
        return $userGroupDataTable->render('user_groups.index');
    }

    /**
     * Show the form for creating a new user_group.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_groups.create');
    }

    /**
     * Store a newly created user_group in storage.
     *
     * @param Createuser_groupRequest $request
     *
     * @return Response
     */
    public function store(Createuser_groupRequest $request)
    {
        $input = $request->all();

        $userGroup = $this->userGroupRepository->create($input);

        Flash::success('User Group saved successfully.');

        return redirect(route('userGroups.index'));
    }

    /**
     * Display the specified user_group.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error('User Group not found');

            return redirect(route('userGroups.index'));
        }

        return view('user_groups.show')->with('userGroup', $userGroup);
    }

    /**
     * Show the form for editing the specified user_group.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error('User Group not found');

            return redirect(route('userGroups.index'));
        }

        return view('user_groups.edit')->with('userGroup', $userGroup);
    }

    /**
     * Update the specified user_group in storage.
     *
     * @param  int              $id
     * @param Updateuser_groupRequest $request
     *
     * @return Response
     */
    public function update($id, Updateuser_groupRequest $request)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error('User Group not found');

            return redirect(route('userGroups.index'));
        }

        $userGroup = $this->userGroupRepository->update($request->all(), $id);

        Flash::success('User Group updated successfully.');

        return redirect(route('userGroups.index'));
    }

    /**
     * Remove the specified user_group from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userGroup = $this->userGroupRepository->find($id);

        if (empty($userGroup)) {
            Flash::error('User Group not found');

            return redirect(route('userGroups.index'));
        }

        $this->userGroupRepository->delete($id);

        Flash::success('User Group deleted successfully.');

        return redirect(route('userGroups.index'));
    }
}
