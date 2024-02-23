<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::whereHas('roles', function ($query) {
            $query->where('name', 'Cliente');
        })->paginate(10);
        return inertia('Client/HomeClient', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Client/Processes/CreateClient');
    }

    public function importClient()
    {
        return inertia('Client/Processes/ImportClient');
    }

    public function createGoogle()
    {
        $googleUser = session('google_user');
        return inertia('Client/Processes/RegisterGoogle', ['googleUser' => $googleUser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:225'],
            'phone_number' => ['required', 'string', 'max:11'],
            'document_type' => ['required', 'string', 'max:225'],
            'document_number' => ['required', 'string', 'max:15', 'min:5', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'phone_number' => $validatedData['phone_number'],
            'document_type' => $validatedData['document_type'],
            'document_number' => $validatedData['document_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->assignRole('Cliente');

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = User::findOrFail($id);
        return inertia('Client/Processes/EditClient', ['clients' => $clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx|max:2048'
        ]);

        try{
            $file = $request->file('import_file');
            Excel::import(new UsersImport, $file);
            return redirect()->route('clients.index');
        }

        catch(\Exception $e){
            dd('Error', $e);
        }

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        if (!User::where('email', $user->getEmail())->exists()) {
            session(['google_user' => $user]);
            return redirect()->route('clients.google');
        }

        $existingUser = User::where('email', $user->getEmail())->first();
        Auth::login($existingUser);
        return redirect()->route('dashboard');
    }

}
