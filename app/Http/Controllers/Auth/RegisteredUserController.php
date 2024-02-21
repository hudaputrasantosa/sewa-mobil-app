<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        $validated =  $request->validate(
            [
                'nama' => ['required', 'string', 'max:255'],
                'alamat' => ['required'],
                'no_telepon' => ['required', 'numeric'],
                'no_sim' => ['required', 'max:20'],
                'role' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', Rules\Password::defaults()],
            ],
            // ['nama.required' => 'Nama Harus Di isi  '],
        );
        $user = new User();
        $user->fill($validated);
        $user->save();

        return redirect()->route('login');
    }
}
