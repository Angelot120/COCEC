<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    private AuthInterface $authInterface;
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

        public function register(RegistrationRequest $registrationRequest)
    {

        $data = [
            "email" => $registrationRequest->email,
            "name" => $registrationRequest->name,
            "password" => $registrationRequest->password,
            "phone_num" => $registrationRequest->phoneNum,
            "passwordConfirm" => $registrationRequest->passwordConfirm,
        ];

        DB::beginTransaction();

        try {

            $user = $this->authInterface->register($data);

            DB::commit();

            return $user;
        } catch (\Throwable $th) {

            return false;
        }
    }


    public function login(LoginRequest $loginRequest)
    {
        $data = [
            'email' => $loginRequest->email,
            'password' => $loginRequest->password,
        ];

        DB::beginTransaction();

        try {
            $result = $this->authInterface->login($data);

            DB::commit();

            if (!$result) {
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
            }

            return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie.');
        } catch (\Throwable $th) {

            DB::rollBack();
            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
