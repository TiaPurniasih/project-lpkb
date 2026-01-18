<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppConfig;
use App\Models\FormConfig;
use App\Models\PermitApplication;
use Hash;

class SettingController extends Controller
{
    function index() {
       
    }

    function doForm(Request $request) {
        
    }

    function indexConfigForm(Request $request) {
        return view('cms.pages.settings.form-config');
    }

    public function configFormDt(Request $request)
    {
        $perPage  = $request->get('per_page', 10);
        $search   = $request->get('search');
        $category = $request->get('category');

        $query = FormConfig::select(
                'category',
                'form_code',
                'form_title',
                'form_codex'
            )
            ->groupBy('category', 'form_code', 'form_title', 'form_codex');

        if ($category) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('form_code', 'like', "%{$search}%")
                ->orWhere('form_title', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $forms = $query->paginate($perPage);

        $data = $forms->map(function ($row, $index) use ($forms) {
            $actions = [
                'route_view' => route('cms.setting.forms.view', [
                    'category' => $row->category,
                    'type' => $row->form_code,
                ]),
                'route_edit' => route('cms.setting.forms.form', [
                    'category' => $row->category,
                    'type' => $row->form_code,
                ]),
            ];

            return [
                'no'   => $forms->firstItem() + $index,
                'type' => ucfirst($row->category),
                'code' => $row->form_title,
                'action' => view('cms.components.action-buttons-forms', compact('actions'))->render(),
            ];
        });

        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $forms->currentPage(),
                'last_page' => $forms->lastPage(),
                'per_page' => $forms->perPage(),
                'total' => $forms->total(),
            ]
        ]);
    }



    function configForm($category, $type = null, $id = null){
        if($type){
            $config = FormConfig::where('id', $id)->first();
        }else{
            $config = new FormConfig;
        }

        $data['configs'] = $config;
        $data['sections'] = FormConfig::select('section')->where('category', $category)->where('form_code')->get();

        return view('cms.pages.settings.form-forms-config', [
            'config'   => $config,        // FormConfig model (new atau existing)
            'category' => $category,      // formal / nonformal
            'type'     => $type,          // nava-dhammasekha
            'isEdit'   => isset($config->id),
        ]);
    }

    function viewConfigForm($category, $type){
         if($type){
            $config = FormConfig::where('category', $category)->where('form_code', $type)->get();
        }else{
            $config = new FormConfig;
        }

        $data['configs'] = $config;
        $data['category'] = $category;
        $data['type'] = $type;

        return view('cms.pages.settings.view-forms-config', $data);
    }

    function store(Request $request) {
        try{
            if($request->user_id){
                $user = User::find(($request->user_id));
            }else{
                $user = new User;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            if($request->has('password')){
                $user->password = Hash::make($request->password);
            }
            $user->role_level = $request->role_level;
            $user->save();

            $msg = "Berhasil";
            $status = "success";
        }catch(\Exception $e){
            $msg = "Galat: ". $e->getMessage();
            $status = "error";
        }
     
        

        return redirect('/manage/permit')->with($status, $msg);
    }

}