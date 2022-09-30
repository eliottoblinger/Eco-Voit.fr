<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials) && !$user->deleted_at) {
            $request->session()->regenerate();
            return json_encode(['status' => 200]);
        }

        return json_encode(['status' => 500]);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function setPicture(Request $request) {
        ini_set('memory_limit', '1024M');
        ini_set('upload_max_filesize', '1024M');
        ini_set('post_max_size', '1024M');
        $s3 = Storage::disk('s3');
        $path = auth()->user()->id . "/profil-picture/avatar." . $request->file->extension();
        $res = $s3->put($path, file_get_contents($request->file->path()));

        if ($res) {
            //https://eco-voit-bucket.s3.eu-west-3.amazonaws.com/ + $path
            // Update avatar user
            $user = User::find(auth()->user()->id);
            $user->update([
                "avatar_url" => "https://eco-voit-bucket.s3.eu-west-3.amazonaws.com/" . $path
            ]);
        }
    }

    public function updatePassword(Request $request) {
        $user = User::find(auth()->user()->id);

        if (!empty($user) && !empty($request->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect('/account');
    }

    public function updateEmail(Request $request) {
        $user = User::find(auth()->user()->id);

        if (!empty($user) && !empty($request->mail)) {
            $user->update([
                "email" => $request->mail
            ]);
        }

        return redirect('/account');
    }

    public function updateIdentity(Request $request) {
        $user = User::find(auth()->user()->id);

        if (!empty($user) && !empty($request->name) && !empty($request->surname)) {
            $user->update([
                "name" => $request->name,
                "surname" => $request->surname
            ]);
        }

        return redirect('/account');
    }

    public function updateBio(Request $request) {
        $user = User::find(auth()->user()->id);

        if (!empty($user) && !empty($request->bio)) {
            $user->update([
                "bio" => $request->bio,
            ]);
        }

        return redirect('/account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user;

        $request->validate([
            'user' => 'required'
        ]);

        $user = User::create([
            'name' => $user['name'],
            'surname' => $user['surname'],
            'email' => $user['email'],
            'birth_date' => Carbon::parse($user['birthDate']),
            'password' => Hash::make($user['password']),
            'role_id' => 1
        ]);

        return json_encode($user, null);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            "deleted_at" => Carbon::now()
        ]);

        Auth::logout();

        return redirect('/login');
    }
}
