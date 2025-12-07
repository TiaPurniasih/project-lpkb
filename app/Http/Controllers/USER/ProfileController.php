<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\InstitutionProfile;

class ProfileController extends Controller
{
    function lembaga($uid = null) {
        if($uid){
            $institution = InstitutionProfile::where('user_id', $uid)->first();
            if (!$institution) {
                $institution = new InstitutionProfile;
            }
        }else{
            $institution = new InstitutionProfile;
        }
        
        $data['institution'] = $institution;
        
        return view('users.profile.lembaga', $data);
    }

public function store(Request $request)
{
    try {
        // Cek apakah update atau create baru
        if ($request->id) {
            $institution = InstitutionProfile::findOrFail($request->id);
        } else {
            $institution = new InstitutionProfile;
        }

        // Ambil semua input kecuali file
        $data = $request->except([
            'registration_certificate_document',
            'articles_of_association_document',
            'facility_photo',
            'front_building_photo',
            'side_building_photo',
            'facility_photo_extra',
            'bank_account_photo',
        ]);

        $data['user_id'] = auth()->id();

        // Daftar file
        $fileFields = [
            'registration_certificate_document',
            'articles_of_association_document',
            'facility_photo',
            'front_building_photo',
            'side_building_photo',
            'facility_photo_extra',
            'bank_account_photo',
        ];

        // Upload file
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)
                    ->store('institutions', 'public');
            }
        }

        // Simpan ke DB
        $institution->fill($data);
        $institution->save();

        return redirect('/beranda')
            ->with('success', 'Data berhasil disimpan!');
    }

    catch (\Exception $e) {
        return redirect('/beranda')
            ->with('error', 'Kesalahan: ' . $e->getMessage());
    }
}

    function history() {
        return view('users.profile.history');
    }
}