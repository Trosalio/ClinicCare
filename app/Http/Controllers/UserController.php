<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Show the page that can only access by admin.

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.dashboard')->with('users', $users);
    }

    /**
     * Display the specified resource and
     * show the form for editing the specified resource as Modal.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.show')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role' => ['required', Rule::in(['client', 'doctor'])],
        ]);

        if($user->update($validatedData)){
            if($user->role === 'doctor'){
                $doctor = new Doctor();
                $doctor->user()->associate($user);
                $doctor->save();
            } elseif($user->role === 'client'){
                $user->doctor->delete();
            }
        }
        return redirect()->route('users.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.dashboard');
    }
}
