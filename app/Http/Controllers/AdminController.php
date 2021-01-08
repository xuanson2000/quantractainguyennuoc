<?php
/**
 * Created by PhpStorm.
 * User: dzung
 * Date: 26/04/2018
 * Time: 10:56 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Admin dashboard
    public function dashboard()
    {
        return view('dashboard.index', compact('dashboard'));
    }
    //Admin function
    public function admin(Request $request)
    {
        if (Auth::check()){
            return redirect()->route('dashboard');
        }
        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($data)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }
}