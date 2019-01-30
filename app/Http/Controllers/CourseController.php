<?php

namespace Kinytron\Http\Controllers;

use Kinytron\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kinytron\College;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Kinytron\Http\Resources\Course as CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('college_id','DESC')->paginate(5);
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::all()->pluck('name','id');
        return view('course.create',compact('colleges'));
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
            'level' => 'required|max:20',
            'letter' => 'required|max:1',
            'college_id' => 'required|integer',
        ]);

        $course = new Course([
            'level' => $request->get('level'),
            'letter' => $request->get('letter'),
            'college_id' => $request->get('college_id'),
        ]);
        $course->save();
        Session::flash('message', 'agregar');
        return redirect('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Kinytron\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Kinytron\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $colleges = College::all()->pluck('name','id');
        return view('course.edit',compact('colleges','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Kinytron\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'letter' => 'required',
            'level' => 'required',
            'college_id' => 'required'
        ]);

        $course->letter = $request->letter;
        $course->level = $request->level;
        $course->college_id = $request->college_id;
        $course->save();
        Session::flash('message', 'editar');
        return Redirect::to('course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Kinytron\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        Session::flash('message','eliminar');
        return Redirect::to('course');
    }
    public function timeline(Request $request){
        $users = Course::find($request->id)->users->where('user_type', '3');
        $course = Course::find($request->id);
        return view('course.plan',compact('course','users'));
    }
    public function getCourse(Request $request){
        $course = Course::find($request->course_id);
        return new CourseResource($course);
    }
    public function mod1(Request $request){
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        $course->mod1 = $request->mod1;
        $course->save();
        Session::flash('message', 'editar');
        return view('course.plan',compact('course','users'));
    }
    public function mod2(Request $request){
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        $course->mod2 = $request->mod2;
        $course->save();
        Session::flash('message', 'editar');
        return view('course.plan',compact('course','users'));
    }
    public function mod3(Request $request){
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        $course->mod3 = $request->mod3;
        $course->save();
        Session::flash('message', 'editar');
        return view('course.plan',compact('course','users'));
    }
    public function mod4(Request $request){
        $users = Course::find($request->course_id)->users->where('user_type', '3');
        $course = Course::find($request->course_id);
        $course->mod4 = $request->mod4;
        $course->save();
        Session::flash('message', 'editar');
        return view('course.plan',compact('course','users'));
    }
    public function changeMod(Request $request){
        $users = Course::find($request->course_id)->users->where('user_type',3);
        $value = $request->changeMod;
        foreach ($users as $user){
            $user->mod0 = $value;
            $user->save();
        }
        $id = $request->course_id;
        Session::flash('message', 'editar');
        return redirect()->action(
            'CourseController@timeline', ['id' => $id]
        );


    }
}
