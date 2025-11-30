<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    function lembaga() {
        return view('users.profile.lembaga');
    }
    function history() {
        return view('users.profile.history');
    }
}