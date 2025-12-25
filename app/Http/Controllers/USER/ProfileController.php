<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\UserDetail;
use App\Models\PermitApplication;

class ProfileController extends Controller
{
    function lembaga(Request $request) {
        $data['institution'] = $request->user()->detail;
        
        return view('users.profile.lembaga', $data);
    }

    public function store(Request $request)
    {
        try {
            // Cek apakah update atau create baru
            if ($request->id) {
                $institution = UserDetail::findOrFail($request->id);
            } else {
                $institution = new UserDetail;
                $institution->user_id = $request->user()->id();
            }

            // Handle file dulu
            foreach ($_FILES as $key => $file) {
                if($file['size'] > 0){
                    $institution->deleteFile($key);
                    $path = $institution->uploadFile($request->file($key), $key);
                    $institution->{$key} = $path;
                }
            }
            $institution->pic_name = $request->pic_name;
            $institution->institution_name = $request->institution_name;
            $institution->institution_head_name = $request->institution_head_name;
            $institution->organizing_body_name = $request->organizing_body_name;
            $institution->institution_phone = $request->institution_phone;
            $institution->established_date = $request->established_date;
            $institution->organizing_body_address = $request->organizing_body_address;
            $institution->province = $request->province;
            $institution->city = $request->city;
            $institution->district = $request->district;
            $institution->subdistrict = $request->village;
            $institution->institution_full_address = $request->institution_full_address;
            $institution->bank_name = $request->bank_name;
            $institution->bank_account = $request->bank_account;
            $institution->bank_province = $request->bank_province;
            $institution->save();

            return redirect('/beranda')->with('success', 'Data berhasil disimpan!');
        }catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/beranda')
                ->with('error', 'Kesalahan: ' . $e->getMessage());
        }
    }

    function history(Request $request) {
        $papp = PermitApplication::where('user_id', $request->user()->id)->paginate(5);
        $data['applications'] = $papp;
        return view('users.profile.history', $data);
    }

    function historyDetail(Request $request, $uid) {

        $papp = PermitApplication::whereUuid($uid)->first();
        $data['application'] = $papp;

        return view('users.profile.history-detail', $data);

        
    }

    function account(Request $request){
        $data['user'] = $request->user();

        return view('users.profile.account', $data);
    }
}