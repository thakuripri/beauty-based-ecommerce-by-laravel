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
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255' ,Rule::unique(User::class)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.regex' => 'The name may only contain letters and spaces.',
        ]);
        
        
        //$request->validate([
            //'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],  // regex for alphabets and spaces
            //'email' => ['required', 'string', 'email', 'max:255',Rule::unique(User::class)->ignore($request->user)], // no need for 'lowercase', handle separately
   
            //'name' => ['required', 'string', 'max:255'],'alpha_spaces',
           // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //]);
        $password = $request->password;
        $cost = 10; 
        // Cost factor for bcrypt (can be adjusted)

        // Create a random salt
        $salt = substr(base64_encode(openssl_random_pseudo_bytes(17)), 0, 22);
        $salt = strtr($salt, '+', '.'); // bcrypt uses ./ instead of + in the salt

        // Build the bcrypt salt format
        $salt = sprintf('$2y$%02d$', $cost) . $salt;

        // Hash the password with bcrypt
        $hashedPassword = crypt($password, $salt);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}