<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'lastname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'dob' => ['required'],

        ]);

        //exit( $request->name . ' - '.  $request->lastname);
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'nickname' => $request->nickname,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function mng()
    {
        $registeredUsers = User::where("role",'!=',null)->get();
        return view('users.mng',compact('registeredUsers'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        //$editUser = User::where("id",2)->get();
        return view('users.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'nickname' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'nickname' => $request->nickname,
            'dob' => $request->dob,
            'role' => $request->role,
        ]);


        return redirect()->route('users.mng')
                         ->withSuccess('Ο χρήστης ενημερώθηκε με επιτυχία');
    }



    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.mng')
            ->withSuccess('Ο χρήστης διαγράφηκε με επιτυχία');
    }
}
