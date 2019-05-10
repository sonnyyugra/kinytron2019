<?php

namespace Kinytron\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Kinytron\College;
use Kinytron\Course;
use Kinytron\Http\Resources\User as UserResource;
use Kinytron\Mail\NewAcc;
use Kinytron\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Alert;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:35',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        Session::flash('message', 'editar');
        $course = User::find($id)->course;
        $users = Course::find($course->id)->users->where('user_type', 3);
        return view('user.list', compact('course', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $course = User::find($id)->course;
        $user->delete();
        $users = Course::find($course->id)->users->where('user_type', 3);
        Session::flash('message', 'eliminar');
        return view('user.list', compact('course', 'users'));
    }
    public function users()
    { }
    public function changeMod0(Request $request)
    {
        $user = User::find($request->user_id);
        $user->mod0 = $request->mod0;
        if ($user->save()) {
            return new UserResource($user);
        }
    }
    public function showcourse(Request $request)
    {
        $course = Course::find($request->id);
        $users = Course::find($request->id)->users->where('user_type', 3);
        return view('user.list', compact('users', 'course'));
    }
    public function add(Request $request)
    {
        $course = Course::find($request->course_id);

        $this->validate($request, [
            'name' => 'required|max:20',
            'lastname' => 'required|max:20',
            'email' => 'required|unique:users',
        ]);

        $user = new User([
            'name' => $request->get('name') . " " . $request->get('lastname'),
            'college_id' => $request->get('college_id'),
            'course_id' => $request->get('course_id'),
            'user_type' => 3,
            'password' => bcrypt('123'),
            'email' => $request->get('email'),
        ]);
        $user->save();
        $users = Course::find($request->course_id)->users->where('user_type', 3);

        Session::flash('message', 'agregar');
        return redirect()->action(
            'UserController@showcourse',
            ['id' => $request->course_id]
        );
    }
    public function addadm()
    {
        return view('user.addadm');
    }
    public function storeadm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'lastname' => 'required|max:20',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'user_type' => 10,
            'password' => bcrypt($request->password),
            'email' => $request->get('email'),
        ]);
        $user->save();
        Session::flash('message', 'agregar');
        return Redirect::to('showadm');
    }
    public function addtutor()
    {
        $colleges = College::all();
        return view('user.addtutor', compact('colleges'));
    }
    public function storetutor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'lastname' => 'required|max:20',
            'email' => 'required|unique:users',
            'password' => 'required',
            'college_id' => 'required',
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'user_type' => 5,
            'password' => bcrypt($request->password),
            'email' => $request->get('email'),
            'college_id' => $request->get('college_id'),
        ]);
        $user->save();
        Mail::to($request->get('email'))->send(new NewAcc($request));
        Session::flash('message', 'agregar');
        return Redirect::to('showtutor');
    }
    public function showadm()
    {
        $users = User::all()->where('user_type', 10);
        return view('user.showadm', compact('users'));
    }
    public function showtutor()
    {
        $colleges = College::all()->pluck('name', 'id');
        $users = User::all()->where('user_type', 5);
        return view('user.showtutor', compact('users', 'colleges'));
    }
    public function deleteadm(User $user)
    {
        $user->delete();
        Session::flash('message', 'eliminar');
        return Redirect::to('showadm');
    }
    public function deletetutor(User $user)
    {
        $user->delete();
        Session::flash('message', 'eliminar');
        return Redirect::to('showtutor');
    }
    public function edittutor($id)
    {
        $user = User::find($id);
        $colleges = College::all()->pluck('name', 'id');;
        return view('user.edittutor', compact('user', 'colleges'));
    }
    public function editadm($id)
    {
        $user = User::find($id);
        return view('user.editadm', compact('user'));
    }
    public function updateadm(Request $request)
    { }
    public function updatetutor(User $user, Request $request)
    {
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->college_id = $request->get('college_id');
        $user->save();
        Alert::success('Se ha actualizado correctamente!', 'Actualizado!');
        return redirect('/showtutor');
    }
}
