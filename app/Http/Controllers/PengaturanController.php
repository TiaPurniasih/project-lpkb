<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    function account(Request $request)
    {
        $data['user'] = $request->user();

        return view('users.akun.pengaturan', $data);
    }

    function store(Request $request)
    {
        try {
            // Cek apakah update atau create baru
            if ($request->id) {
                $user = User::findOrFail($request->id);
            } else {
                $user = new User;
            }

            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            return redirect('/pengaturan')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/pengaturan')
                ->with('error', 'Kesalahan: ' . $e->getMessage());
        }
    }
}
