<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //

    public function datatable($role)
    {
        $data = User::with("$role")->whereJsonContains('roles', $role);

        return DataTables::of($data)->make(true);
    }

    public function index()
    {
        if (\request()->isMethod('POST')) {
            return $this->store();
        }

        return view('superuser.user.user');
    }

    public function store()
    {
        $field         = \request()->validate(
            [
                'name' => 'required',
            ]
        );
        $fieldPassword = \request()->validate(
            [
                'password' => 'required|confirmed',
            ]
        );
        $roles         = \request('roles');
        Arr::set($field, 'roles', ["$roles"]);
        DB::beginTransaction();
        try {
            if (\request('id')) {
                $fieldUserEdit = \request()->validate(
                    [
                        'email'    => 'required|string',
                        'username' => 'required|string',
                    ]
                );
                Arr::set($field, 'username', $fieldUserEdit['username']);
                Arr::set($field, 'email', $fieldUserEdit['email']);
                $cekUsername   = User::where([['username', '=', \request('username')], ['id', '!=', \request('id')]])->first();
                if ($cekUsername) {
                    return \request()->validate(
                        [
                            'username' => 'required|string|unique:users,username',
                        ]
                    );
                }

                $cekEmail = User::where([['email', '=', \request('email')], ['id', '!=', \request('id')]])->first();
                if ($cekEmail) {
                    return \request()->validate(
                        [
                            'username' => 'required|string|unique:users,username',
                        ]
                    );
                }

                $user = User::find(\request('id'));
                if (strpos($fieldPassword['password'], '*') === false) {
                    $password = Hash::make($fieldPassword['password']);
                    Arr::add($field, 'password', $password);
                }

                $user->update($field);
                $user->$roles()->update(['name' => $field['name']]);
            } else {
                $fieldUser = \request()->validate(
                    [
                        'email'    => 'required|string|unique:users,email',
                        'username' => 'required|string|unique:users,username',
                    ]
                );
                Arr::set($field, 'username', $fieldUser['username']);
                Arr::set($field, 'email', $fieldUser['email']);
                $password = Hash::make($fieldPassword['password']);
                Arr::set($field, 'password', $password);
                $user = User::create($field);
                $user->$roles()->create($field);
            }
            DB::commit();

            return response()->json(['msg' => 'success']);
        } catch (\Exception $er) {
            DB::rollBack();

            return response()->json(['msg' => $er->getMessage()], 501);
        }
    }

    public function delete($id){

    }

}
