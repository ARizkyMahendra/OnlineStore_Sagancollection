<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('admin.page.user', [
            'name'  => 'User management',
            'title' => 'Admin User management',
            'data'  => $data,
        ]);
    }

    public function addModalUser()
    {
        return view('admin.modal.addModalUser', [
            'title'     => 'Tambah data User',
            'nickname'  => date('Ymd') . rand(000, 999),
        ]);
    }

    public function store(UserRequest $request)
    {
        $data = new User;
        $data->nickname     = $request->nickname;
        $data->name         = $request->name;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->password);
        $data->notlp        = $request->notlp;
        $data->role         = $request->role;
        $data->isActive     = 1;
        $data->isMember     = 0;
        $data->isAdmin      = 1;


        if ($request->hasFile('formFile')) {
            $photo = $request->file('formFile');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->image = $filename;
        }
        $data->save();

        Alert::toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('userManagement');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view(
            'admin.modal.editModalUser',
            [
                'title' => 'Edit data User',
                'data' => $data,
            ]
        )->render();
    }

    public function update(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        if ($request->file('formFile')) {
            $photo = $request->file('formFile');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->image = $filename;
        } else {
            $filename = $request->image;
        }

        $field = [

            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'notlp'        => $request->notlp,
            'role'         => $request->role,
            'image'          => $filename,
        ];

        $data::where('id', $id)->update($field);
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('userManagement');
    }

    public function destroy($id)
    {
        $product = User::findOrFail($id);
        $product->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }
}
