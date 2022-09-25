<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function index()
    {
        $akun = Akun::all();
        return view('akun.index', compact('akun'));
    }
}
