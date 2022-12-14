<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\ChangeProfileRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;

class FrontController extends Controller
{
    public function index() {
        return view('front.pages.index');
    }

    public function login() {
        if(Auth::check()) return redirect()->route('front.index');
        return view('front.pages.login');
    }

    public function register() {
        if(Auth::check()) return redirect()->route('front.index');
        return view('front.pages.register');
    }

    public function profile() {
        if(!Auth::check()) return redirect()->route('front.login');
        return view('front.pages.user.profile');
    }

    public function changePassword(ChangePasswordRequest $request){
        if(!Auth::check()) {
            return response()->json(['redirect' => true, 'redirectUrl' => route('front.login')], 401);
        }

        $current_password = $request->current_password;
        if(!Hash::check($current_password, Auth::user()->getAuthPassword())){
            return response()->json(['message' => 'Está senha parece estar incorreta!'], 401);
        }

        try{

            DB::beginTransaction();

            $user = User::findOrFail(Auth::id());
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            DB::commit();
            return response()->json(['message' => 'Senha modificada com sucesso!']);

        }catch(Exception $e){

            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);

        }


    }

    public function changeProfile(ChangeProfileRequest $request){
        if(!Auth::check()) {
            return response()->json(['redirect' => true, 'redirectUrl' => route('front.login')], 401);
        }

        try{

            DB::beginTransaction();

            $user = User::findOrFail(Auth::id());
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name
            ]);

            DB::commit();
            return response()->json(['message' => 'Dados modificados com sucesso!']);

        }catch(Exception $e){

            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);

        }


    }
}
