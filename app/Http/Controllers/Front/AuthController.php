<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    /**
     * Make login Request
     *
     * @param LoginRequest $request
     * @return void
     */
    public function login(LoginRequest $request) {

        $request = $request->validated();

        $email = $request['email'];
        $password = $request['password'];

        $do = Auth::attempt(['email' => $email, 'password' => $password], true);

        if($do){
            return response()->json(['success' => true, 'message' => 'Success'], 200);
        }else{
            return response()->json(['success' => false, 'message' => 'Usuário ou senha inválidos'], 401);
        }


    }

    /**
     * Make Register Request
     *
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request){

        if(Auth::check()) return abort(500, 'Usuário com sessão ativa');

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            'name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'role' => 'user'
        ]);

        if($user){
            return response()->json(['success' => true, 'message' => 'Conta criada com sucesso!', 'data' => $user], 200);
        }

        return response()->json(['success' => false, 'message' => 'Erro ao criar conta.'], 500);
    }

    /**
     * Destroy user session for logout
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request){
        if(!Auth::check()) return redirect()->route('front.index');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('front.index');

    }
}
