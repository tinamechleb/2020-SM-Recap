<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\AdminRole;
use Hash;


class AdminsController extends Controller
{
    public function index()
    {
        $rows = Admin::whereNotNull('admin_role_id')->get();
        return view('admin/admins/index', compact('rows'), ['page_title' => 'Admins']);
    }

    public function create()
    {
        $admin_roles = [];
        $admin_roles = AdminRole::get();
        return view('admin/admins/create', compact('admin_roles'), ['page_title' => 'Add an Admin']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image',
            'email' => 'required|unique:admins',
            'password' => 'required|confirmed',
            'admin_role_id' => 'required',
        ]);

        $row = new Admin;
        $row->name = $request->name;
        if ($request->image) {
            $image = time() . '_' . md5(rand()) . '.' . request()->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/admins'), $image);
            $row->image = 'storage/admins/' . $image;
        }
        $row->email = $request->email;
        $row->password = Hash::make($request->password);
        $row->admin_role_id = $request->admin_role_id;
        $row->save();

        $request->session()->flash('success', 'Record added successfully');
        $rows = Admin::whereNotNull('admin_role_id')->get();
        return view('admin/admins/index', compact('rows'), ['page_title' => 'Admins']);
    }

    public function show($id)
    {
        $row = Admin::findOrFail($id);
        return view('admin/admins/show', compact('row'), ['page_title' => 'Admin']);
    }

    public function edit($id)
    {
        $row = Admin::findOrFail($id);
        $admin_roles = [];
        $admin_roles_db = AdminRole::get()->toArray();
        foreach ($admin_roles_db as $single_admin_roles_db) $admin_roles[$single_admin_roles_db['id']] = $single_admin_roles_db;

        return view('admin/admins/edit', compact('row', 'admin_roles'), ['page_title' => 'Edit Admin']);
    }

    public function update(Request $request, $id)
    {
        $row = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'image',
            'email' => 'required|unique:admins,email,' . $row->id,
            'password' => 'confirmed',
            'admin_role_id' => 'required',
        ]);

        $row->name = $request->name;
        if ($request->remove_file_image) {
            $row->image = '';
        } elseif ($request->image) {
            $image = time() . '_' . md5(rand()) . '.' . request()->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/admins'), $image);
            $row->image = 'storage/admins/' . $image;
        }
        $row->email = $request->email;
        if ($request->password) $row->password = Hash::make($request->password);
        $row->admin_role_id = $request->admin_role_id;
        $row->save();

        $request->session()->flash('success', 'Record edited successfully');
        return url('admin' . '/admins');
    }

    public function destroy($id)
    {
        $array = explode(',', $id);
        foreach ($array as $id) Admin::destroy($id);
        return redirect('admin' . '/admins')->with('success', 'Record deleted successfully');
    }
}
