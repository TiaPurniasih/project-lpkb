<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PerizinanController extends Controller
{
    function index() {
        return view('users.perizinan.index');
    }

    function permition(Request $request, $type, $form)  {
        $config = config('siopkb.form_type.'.$type);

        $data['form'] = null;
        foreach ($config as $value) {
            if($value['code'] == $form){
                $data['form'] = $value;
            }
        }

        $data['params'] = [
            'type' => $type,
            'form' => $type
        ];

        return view('users.perizinan.form', $data);
        
    }
}