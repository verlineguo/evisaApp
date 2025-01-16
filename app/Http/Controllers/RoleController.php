<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('role/index', ['role' =>$role]);
    }

    public function create()
    {
        return view('role.form');
    }

    public function save(Request $request) 
    {
        $request->validate([
            'idRole' => 'required|string|max:10|unique:role,idRole',
            'roleName' => 'required|string|max:30',
        ]);

        Role::create([
            'idRole' => $request->idRole,
            'roleName' => $request->roleName,
        ]);

        return redirect()->route('role')->with('success', 'Role berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id)->first();
        
        return view('role.form', ['role' => $role]);
    }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'roleName' => $request->roleName,
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }


    


}
