<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class footerController extends Controller
{
    public function termo()
    {
        return view("footer.termos");
    }

    public function contact()
    {
        return view('footer.contact');
    }
}
