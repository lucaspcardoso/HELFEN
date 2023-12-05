<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfissionalController extends Controller
{

    public function loginP(Request $request)
    {
        $prof = Profissional::where('email', $request->input('email'))->first();
        Auth::loginUsingId($prof->id);

        return redirect()->route('dashboard');
    }
}
