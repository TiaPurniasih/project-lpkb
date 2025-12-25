<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use App\Models\PermitApplication;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function dashboard(Request $request) {
        $papp = PermitApplication::where('user_id', $request->user()->id)->paginate(5);
        $data['applications'] = $papp;
        return view('users.dashboard', $data);
    }
}