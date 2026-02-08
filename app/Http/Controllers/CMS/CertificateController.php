<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\PermitApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CertificateController extends Controller
{
    function index() {
        $data['items'] = PermitApplication::whereIn('status', [4,5])->with('user.detail')->paginate(20);
        return view('cms.pages.manages.certificate.index',  $data);
    }

    function uploadCertif(Request $request) {
        $request->validate([
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB
        ]);


        if($request->id){
            try {
                //code...
                $check = PermitApplication::findOrFail($request->id);
               
                if($request->hasFile('certificate')) {
                    $path = $check->uploadFile($request->file('certificate'), $request->certificate_file, '/certificates/'.$check->code, true, false);
                    $check->certificate_file = $path;
                    $check->certificate_state = 1;
                    $check->published_at = date('Y-m-d H:i:s');
                    $check->save();
                }
    
                return redirect()->back()->with('success', 'Berhasil di unggah');
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
        }
        
    }
}