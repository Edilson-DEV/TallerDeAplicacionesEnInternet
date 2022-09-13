<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(Request $request){

      $credentials = $request->only('email','password');
      if (!Auth::attempt($credentials)){
          return response([
              "message"=>"Usuario y Contraseña es invalido. "
          ]);
      }
      $accessToken = Auth::user()->createToken('authTestToken')->accessToken;
      return response([
          "user" => Auth::user(),
           "access_token" => $accessToken
      ]);
  }

  public function logout(){
      if (Auth::check()) {
          $token = Auth::user()->token();
          $token->revoke();
      }
      return response()->json([
          'ok' => true,
          'message' => 'Se cerro session correctamente.',
      ]);

  }

    public function me(){
    return response()->json([
        'ok' => true,
        'user' => Auth::user()
    ]);
    }
    public function register(Request $request){
//      abort(500, 'todo va bien hasta');
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }

}
