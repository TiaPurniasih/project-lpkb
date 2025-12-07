<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    public function provinces()
    {
        $data = Http::get('https://wilayah.id/api/provinces.json')->json();
        return response()->json($data);
    }

    public function regencies($id)
    {
        $data = Http::get("https://wilayah.id/api/regencies/{$id}.json")->json();
        return response()->json($data);
    }

    public function districts($id)
    {
        $data = Http::get("https://wilayah.id/api/districts/{$id}.json")->json();
        return response()->json($data);
    }

    public function villages($id)
    {
        $data = Http::get("https://wilayah.id/api/villages/{$id}.json")->json();
        return response()->json($data);
    }
}
