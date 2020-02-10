<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Kinytron\Mail\Contacto;
use Kinytron\Mail\Welcome;
use Alert;
class MailController extends Controller
{
    public function contact(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'cargo' => 'required',
            'colegio' => 'required',
            'telefono' => 'required|integer',
            'email' => 'required|email'
        ]);

        Mail::to('contacto@yucof.com')->send(new Contacto($request));
        Mail::to($request->email)->send(new Welcome($request));
        Session::flash('msg','Gracias, te contactaremos a la brevedad!');
        return redirect('/demo');
    }
}
