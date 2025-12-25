<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function provinces()
    {
        $data = DB::table('regions')
            ->whereRaw("LENGTH(code) = 2")
            ->orderBy('name')
            ->get(['code', 'name']);

        return response()->json(['data' => $data]);
    }

    public function regencies($province)
    {
        $data = DB::table('regions')
            ->where('code', 'like', $province . '.%')
            ->whereRaw("LENGTH(code) - LENGTH(REPLACE(code, '.', '')) = 1")
            ->orderBy('name')
            ->get(['code', 'name']);

        return response()->json(['data' => $data]);
    }

    public function districts($regency)
    {
        $data = DB::table('regions')
            ->where('code', 'like', $regency . '.%')
            ->whereRaw("LENGTH(code) - LENGTH(REPLACE(code, '.', '')) = 2")
            ->orderBy('name')
            ->get(['code', 'name']);

        return response()->json(['data' => $data]);
    }

    public function villages($district)
    {
        $data = DB::table('regions')
            ->where('code', 'like', $district . '.%')
            ->whereRaw("LENGTH(code) - LENGTH(REPLACE(code, '.', '')) = 3")
            ->orderBy('name')
            ->get(['code', 'name']);

        return response()->json(['data' => $data]);
    }
}
