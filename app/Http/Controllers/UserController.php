<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Client;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Show the page that can only access by admin.

class UserController extends Controller
{
    private static $roles = ['client', 'doctor'];
    private static $gender = ['m', 'f'];
    private static $blood_types = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     * method: get
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')
            ->with('roles', UserController::$roles)
            ->with('gender', UserController::$gender)
            ->with('blood_types', UserController::$blood_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * method: post
     */
    public function store(Request $request)
    {
        // validate user data
        $request->validate([
            'username' => 'required|string|between:4,20|unique:users,username',
            'password' => 'required|between:6,20|confirmed',
            'email' => 'required|email|between:4,50|unique:users,username',
            'role' => ['required', Rule::in(UserController::$roles)],
        ]);
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        if($request->input('role') === 'doctor'){
            $request->validate([
                'medical_license_no' => 'nullable|string|size:10|unique:doctors,medical_license_no'
            ]);
        }
        $request->validate([
            'firstname' => 'nullable|alpha',
            'lastname' => 'nullable|alpha',
            'id_no' => 'nullable|numeric|digits:13|unique:clients,id_no',
            'tel_no' => 'nullable|numeric|digits:10|unique:clients,tel_no',
            'gender' => ['required', Rule::in(UserController::$gender)],
            'weight' => 'nullable|numeric|digits:3',
            'height' => 'nullable|numeric|digits:3',
            'blood_type' => ['required', Rule::in(UserController::$blood_types)],
            'intolerances' => 'nullable|string',
            'health_conditions' => 'nullable|string',
        ]);
        if ($user->save()) {
            if ($user->role === 'doctor') {
                // validate doctor data
                $doctor = new Doctor;
                $doctor->medical_license_no = $request->input('medical_license_no');
                $doctor->user()->associate($user);
                $doctor->save();
            }
            // validate client data
            $client = new Client;
            $client->firstname = $request->input('firstname');
            $client->lastname = $request->input('lastname');
            $client->id_no = $request->input('id_no');
            $client->tel_no = $request->input('tel_no');
            $client->gender = $request->input('gender');
            $client->weight = $request->input('weight');
            $client->height = $request->input('height');
            $client->blood_type = $request->input('blood_type');
            $client->intolerances = $request->input('intolerances');
            $client->health_conditions = $request->input('health_conditions');
            $client->user()->associate($user);
            $client->save();
        };
        return redirect()->route('users.show', ['user' => $user]);
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
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     * method: get
     */
    public function edit(User $user)
    {
        return view('users.edit')
            ->with('user', $user)
            ->with('roles', UserController::$roles)
            ->with('gender', UserController::$gender)
            ->with('blood_types', UserController::$blood_types);
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
            'username' => ['required', 'string', 'between:4,20', Rule::unique
            ('users')->ignore($user->id)],
            'email' => ['required', 'email', 'between:4,50', Rule::unique
            ('users')->ignore($user->id)],
            'role' => ['required', Rule::in(UserController::$roles)],
        ]);

        if ($user->update($validatedData)) {
            if ($user->role === 'doctor') {
                $doctor = new Doctor();
                $doctor->user()->associate($user);
                $doctor->save();
            } elseif ($user->role === 'client') {
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
        return redirect()->route('users.index');
    }

    public function savePDF()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.users.pdf-report', ['users' => $users])->setPaper('a4', 'landscape');
        return $pdf->download('report.pdf');
    }
}
