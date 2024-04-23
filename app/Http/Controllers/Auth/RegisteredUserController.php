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
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
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
    public function store(Request $request): RedirectResponse
    {


        $valida = $request->validate([
            'username' => ['required', 'string', 'regex:/^\S*$/', 'max:2048', Rule::unique('users', 'username')],
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'birth' => ['required', 'string'],
            'rg' => ['nullable', 'string', 'max:20'],
            'cpf' => ['required', 'string', 'min:14', 'max:15'],
            'address' => ['required', 'string', 'max:100'],
            'number' => ['required', 'string', 'max:8'],
            'district' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed',  Password::min('8')->mixedCase()->uncompromised()->symbols()],
        ]);

        $createUserMoodle = new User();

        $resCreate = $createUserMoodle->createUserMoodle(
            $request->username,
            $request->password,
            $request->name,
            $request->lastname,
            $request->email,
        );

        if(isset($resCreate[0]->id)){

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'birth' => $request->birth,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'address' => $request->address,
                'number' => $request->number,
                'city' => $request->city,
                'district' => $request->district,
            ]);

            $user->assignRole('user');

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }else{

            toastr()->error('Esso ao criar Usuario!');
            return false;
        }

    }
}
