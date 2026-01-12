<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PermitApplication;

use Hash;

class PermitController extends Controller
{
    function index() {
        $data['wilayah'] = DB::table('regions')
            ->whereRaw("LENGTH(code) = 2")
            ->orderBy('name')
            ->get(['code', 'name']);
        return view('cms.pages.manages.permit.index', $data);
    }

    public function datatable(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search  = $request->get('search');
        $category  = $request->get('category');

        $query = PermitApplication::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', "%{$search}%")
                ->orWhere('province', 'like', "%{$search}%");
            });
        }
      
        $permit = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $data = $permit->map(function ($pmt, $index) use ($permit) {
            $actions = [
                'id' => $pmt->id,
                'route_view' => 'cms.manage.permit.view',
                'route_edit' => 'cms.manage.permit.form',
                'route_delete' => 'cms.manage.permit.destroy',
            ];
            $user = $pmt->user ?? null;
            $detail = $user->detail ?? null;

            $class = '';
            if($pmt->status == 0 || $pmt->status == 1){
                $class = 'bg-[#FFF1E7] text-[#F26B38]';
            }elseif($pmt->status == 2 || $pmt->status == 3){
                $class = 'bg-[#E8F7EF] text-[#1C9A5A]';
            }else{
                $class = 'bg-gray-100 text-gray-600';
            }

            $status = $pmt->state ?? '0';
            
            $state = ' <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold '.$class.'">'.config('siopkb.state.'.$status).'</span>';
            return [
                'no' => $permit->firstItem() + $index,
                'code' => $pmt->code ?? '',
                'institution_name' => $detail->institution_name ?? '',
                'type' => ucfirst($pmt->type),
                'form_type' => ucfirst($pmt->form_type),
                'state' => $state,
                'created_at' => $pmt->created_at->format('Y-m-d H:i:s'),
                'action' => view('cms.components.action-buttons', compact('pmt', 'actions'))->render(),
            ];
        });

        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $permit->currentPage(),
                'last_page' => $permit->lastPage(),
                'per_page' => $permit->perPage(),
                'total' => $permit->total(),
            ]
        ]);
    }

    function form($id = null){
        if($id){
            $permit = PermitApplication::findOrFail($id);
        }else{
            $permit = new PermitApplication;
        }

        $data['wilayah'] = DB::table('regions')
            ->whereRaw("LENGTH(code) = 2")
            ->orderBy('name')
            ->get(['code', 'name']);

        $data['permit'] = $permit;

        return view('cms.pages.manages.permit.form', $data);
    }

    function view($id){
        $permit = PermitApplication::findOrFail($id);
        $data['permit'] = $permit;

        return view('cms.pages.manages.permit.view', $data);
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