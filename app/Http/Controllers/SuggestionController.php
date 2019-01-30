<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Http\Request;
use Kinytron\Suggestion;
use Illuminate\Support\Facades\Session;
use Alert;


class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::all();
        return view('suggestion.index',compact('suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggestion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:2000',
            'user_id' => 'required'
        ]);

        $suggestion = new Suggestion([
            'description' => $request->get('description'),
            'user_id' => $request->get('user_id'),
        ]);
        $suggestion->save();
        Alert::success('Muchas gracias por tu ayuda!', 'Enviado!');
        Session::flash('message', 'agregar');
        return redirect('/createsug');
    }
    public function destroy(Suggestion $suggestion)
    {
        $suggestion->delete();
        Session::flash('message','eliminar');
        Alert::error('GG!', 'Eliminado!');

        return redirect('/indexsug');
    }

    public function show(Suggestion $suggestion){
        return view('suggestion.show',compact('suggestion'));
    }

}
