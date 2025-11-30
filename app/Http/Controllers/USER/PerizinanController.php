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
}