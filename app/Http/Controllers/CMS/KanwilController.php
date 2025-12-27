<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kanwil;

use Hash;

class KanwilController extends Controller
{
    function index() {
        return view('cms.pages.manages.kanwil.index');
    }

    public function datatable(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search  = $request->get('search');
        $category  = $request->get('category');

        $query = Kanwil::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }

      
        $kanwil = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $data = $kanwil->map(function ($kwl) {
            return [
                'name' => $kwl->name,
                'email' => $kwl->email,
                'is_active' => $kwl->is_active
                    ? '<span class="inline-flex rounded-full px-3 py-0.5 text-sm bg-green-100 text-green-800">Aktif</span>'
                    : '<span class="inline-flex rounded-full px-3 py-0.5 text-sm bg-gray-200 text-gray-600">Tidak Aktif</span>',

                'organization' => $kwl->role_level == 10
                    ? ($kwl->detail && $kwl->detail->is_complete
                        ? '<span class="rounded-full px-3 py-0.5 text-sm bg-green-100 text-green-800">Lengkap</span>'
                        : '<span class="rounded-full px-3 py-0.5 text-sm bg-gray-200 text-gray-600">Belum lengkap</span>')
                    : '-',

                'created_at' => $kwl->created_at->format('Y-m-d H:i:s'),

                'action' => view('cms.components.action-buttons', compact('user'))->render(),
            ];
        });

        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $kanwil->currentPage(),
                'last_page' => $kanwil->lastPage(),
                'per_page' => $kanwil->perPage(),
                'total' => $kanwil->total(),
            ]
        ]);
    }

    function form($id = null){
        if($id){
            $kanwil = Kanwil::findOrFail($id);
        }else{
            $kanwil = new Kanwil;
        }

        $data['wilayah'] = DB::table('regions')
            ->whereRaw("LENGTH(code) = 2")
            ->orderBy('name')
            ->get(['code', 'name']);

        $data['kanwil'] = $kanwil;

        return view('cms.pages.manages.kanwil.form', $data);
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
     
        

        return redirect('/manage/kanwil')->with($status, $msg);
    }

}