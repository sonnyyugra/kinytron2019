<?php

namespace Kinytron\Http\Controllers;

use Kinytron\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::all();
        return view('college.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('college.create');
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
            'name' => 'required|unique:colleges|max:35',
            'demo' => 'required'
        ]);

        $college = new College([
            'name' => $request->get('name'),
            'demo' => $request->get('demo'),
        ]);
        $college->save();
        Session::flash('message', 'agregar');
        return redirect('/college');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Kinytron\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kinytron\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college = College::find($id);
        return view('college.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kinytron\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:35',
            'demo' => 'required'
        ]);
        $college = College::find($id);
        $college->name = $request->name;
        $college->demo = $request->demo;
        $college->save();
        Session::flash('message', 'editar');
        return Redirect::to('college');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kinytron\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::find($id);
        $college->delete();
        Session::flash('message', 'eliminar');
        return Redirect::to('college');
    }
}
