<?php

namespace App\Http\Controllers\USER;

use App\Models\PermitApplication;
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
            'form' => $form
        ];

        return view('users.perizinan.form', $data);
    }

    function submit(Request $request) {
        // dd($request->all());
        $type = $request->type;
        $form = $request->form;

        try {
            $permit_app = new PermitApplication;
            $permit_app->user_id = $request->user()->id;
            $permit_app->type = $type;
            $permit_app->form_type = $form;

            $config_form = config('siopkb.form_type.'.$type);
            $fields = null;
            $codex = null;
            foreach ($config_form as $value) {
                if($value['code'] == $form){
                    $fields = $value['fields'];
                    $codex = $value['codex'];
                }
            }

            $forms = [];
            foreach ($request->all() as $key => $item) {
                if(in_array($key, ['type', 'form', '_token'])){
                    continue;
                }

                $field = null;
                foreach ($fields as $fk => $fl) {
                    if($fl['name'] == $key){
                        $field = $fl;
                    }
                }

                if(!$field){
                    continue;
                }

                if($field['type'] == 'file'){
                    $path = '';
                    if($request->hasFile($key)) {
                        $path = $permit_app->uploadFile($request->file($key), $key, '/'.$type.'/'.$form, true, false);
                    }
                    $forms[$key] = $path;
                }else{
                    $forms[$key] = $item;
                }

                if($key == 'province'){
                    $permit_app->province = $item; 
                }
            }

            $makeForm = json_encode($forms, JSON_UNESCAPED_UNICODE);
            $permit_app->form = $makeForm;
            $permit_app->save();

            $paddedId = str_pad($permit_app->id, 7, '0', STR_PAD_LEFT);
            $permit_app->code = $codex.date('YmdHis').$paddedId;
            $permit_app->save();

        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect('/beranda')->with('success', 'Permintaan anda sudah dikirim!');
    }
}