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
use App\Exceptions\Handler;
use App\Exceptions;
use Exception;

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

        try{
            //, Rules\Password::defaults()
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'=>['required','string','max:255'],
                'sex'=>['required','string','max:10'],
                'birthdate'=>['required','date'],
                'address'=>['required','string','max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
            ]);


            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'sex'=>$request->sex,
                'birthdate'=>$request->birthdate,
                'address'=>$request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }catch(Exception $e){
            $notification = array(
                'message'    => 'Registration Failed!',
                'alert-type' => 'error'
            );
            return redirect('/register')->with($notification);
        }
       
       
    }
}
