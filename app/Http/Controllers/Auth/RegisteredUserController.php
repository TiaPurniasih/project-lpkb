<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required','email:rfc,dns','max:255',Rule::unique('users', 'email'),],
            'password' => ['required','confirmed',Password::min(8)->letters()->numbers(),],
            'phone' => ['required','regex:/^[0-9]{9,15}$/'],
            'institution_name' => ['required', 'string', 'max:150'],
            'province' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'subdistrict' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:500'],
        ]);

        DB::beginTransaction();

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            $detail = new UserDetail();
            $detail->user_id = $user->id;
            $detail->institution_name = $request->institution_name;
            $detail->province = $request->province;
            $detail->city = $request->city;
            $detail->district = $request->district;
            $detail->subdistrict = $request->subdistrict;
            $detail->address = $request->address;
            $detail->save();

            if($request->hasFile('docs_1')) {
                $path = $detail->uploadFile($request->file('docs_1'), 'docs_1');
                $detail->docs_1 = $path;
                $detail->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // optional: log error
            \Log::error($th);
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
