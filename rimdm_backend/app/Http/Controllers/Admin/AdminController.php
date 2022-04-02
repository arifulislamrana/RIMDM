<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $adminList = resolve('App\ViewModels\Admin\AdminListModel');
        $adminList->load();

        return view('admin.admins.admin_list',['adminList'=>$adminList]);
    }

    public function create()
    {
        $addAdminModel = resolve('App\ViewModels\Admin\AddAdminModel');
        $addAdminModel->load();

        return view('admin.admins.make_admin', ['teachers' => $addAdminModel->teachers]);
    }

    public function store(Request $request)
    {
        $addAdminModel = resolve('App\ViewModels\Admin\AddAdminModel');
        $addAdminModel->UpgradeToAdmin($request->id);

        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removeAdminModel = resolve('App\ViewModels\Admin\RemoveAdminModel');
        $removeAdminModel->removeFromAdminship($id);

        return redirect()->route('admins.index');
    }
}
