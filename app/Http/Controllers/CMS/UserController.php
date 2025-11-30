<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    function index() {
        return view('cms.pages.manages.users.index');
    }

    public function datatable(Request $request) {
        $user  = User::where('role_level', '<', $request->user()->role_level );

        return DataTables::of($user)
            ->editColumn('created_at', function($user) {
                return $user->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('is_active', function($user) {
                if($user->is_active){
                    return '<span class="inline-flex items-center rounded-full px-3 py-0.5 text-sm font-medium bg-green-100 text-green-800">Aktif</span>';
                }else{
                    return '<span class="inline-flex items-center rounded-full px-3 py-0.5 text-sm font-medium bg-gray-200 text-gray-600">Tidak Aktif</span>';
                }
            })
            ->addColumn('action', function($user) {
                // return '<a href="'.route('cms.manage.users.form', $user->id).'" class="">Edit</a>';
                $html = '<div class="inline-flex items-center shadow-theme-xs">';
                $html = $html.'
                    <a href="'.route('cms.manage.users.view', $user->id).'"
                        class="-ml-px inline-flex items-center gap-2  px-3 py-3 text-sm font-medium border border-solid ring-dark-500 rounded-l-lg last:rounded-r-lg hover:bg-brand-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                    </a>';
                $html = $html.'
                    <a href="'.route('cms.manage.users.form', $user->id).'"
                        class="-ml-px inline-flex items-center gap-2  px-3 py-3 text-sm font-medium border border-solid ring-dark-500 rounded-l-lg last:rounded-r-lg hover:bg-brand-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg>
                    </a>';
                $html = $html.'
                    <button type="button"
                        class="-ml-px inline-flex items-center gap-2  px-3 py-3 text-sm font-medium border border-solid ring-dark-500 rounded-l-lg last:rounded-r-lg hover:bg-brand-500 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash"><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </button>';
                $html = $html.'</div>';
                
            })
             ->rawColumns(['action', 'is_active'])
            ->make(true);
    }

    function form($id = null){
        if($id){
            $user = User::findOrFail($id);
        }else{
            $user = new User;
        }

        $data['user'] = $user;

        return view('cms.pages.manages.users.form', $data);
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
     
        

        return redirect('/manage/users')->with($status, $msg);
    }
    
}