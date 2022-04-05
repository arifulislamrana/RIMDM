<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        try
        {
            $adminList = resolve('App\ViewModels\Admin\AdminListModel');
            $adminList->load();

            return view('admin.admins.admin_list',['adminList'=>$adminList]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to admin list", $e);

            return redirect()->back()->withErrors(['invalid' => 'Temporary error occured. Please try later']);
        }
    }

    public function create()
    {
        try
        {
            $addAdminModel = resolve('App\ViewModels\Admin\AddAdminModel');
            $addAdminModel->load();

            return view('admin.admins.make_admin', ['teachers' => $addAdminModel->teachers]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to create admin form", $e);

            return redirect()->back()->withErrors(['invalid' => 'Temporary error occured. Please try later']);
        }
    }

    public function store(Request $request)
    {
        try
        {
            $addAdminModel = resolve('App\ViewModels\Admin\AddAdminModel');
            $addAdminModel->UpgradeToAdmin($request->id);

            return redirect()->route('admins.index');
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to store admin data", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to store admin data. Please recheck input']);
        }
    }


    public function show($id)
    {
        try
        {
            return redirect()->route('teachers.show', ['teacher' => $id]);
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to show admin data", $e);

            return redirect()->back()->withErrors(['invalid' => 'Admin data could not be shown.']);
        }
    }


    public function edit($id)
    {
        try
        {
            $editAdminModel = resolve('App\ViewModels\Admin\EditAdminModel');
            $editAdminModel->load($id);

            return view('admin.admins.update_admin', ['editAdminModel' => $editAdminModel]);

        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to edit form for admin", $e);

            return redirect()->back()->withErrors(['invalid' => 'Some temporary error occured. Please wait and try']);
        }
    }


    public function update(Request $request, $id)
    {
        try
        {
            $editAdminModel = resolve('App\ViewModels\Admin\EditAdminModel');
            $editAdminModel->editAdminship($id, $request->role);

            return redirect()->route('admins.index');

        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to update admin data", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to update admin data. Please recheck input']);
        }
    }


    public function destroy($id)
    {
        try
        {
            $removeAdminModel = resolve('App\ViewModels\Admin\RemoveAdminModel');
            $removeAdminModel->removeFromAdminship($id);

            return redirect()->route('admins.index');
        }
        catch (Exception $e)
        {
            $this->logger->write("error", "Failed to remove", $e);

            return redirect()->back()->withErrors(['invalid' => 'Failed to remove. Please recheck input']);
        }
    }
}


