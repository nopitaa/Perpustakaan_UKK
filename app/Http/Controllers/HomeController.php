<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class HomeController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/buku';
        } else {
            return '/bukus';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}