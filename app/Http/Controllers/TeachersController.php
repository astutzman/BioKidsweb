<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Observations;
use App\ObservationView;
use App\Groups;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use Auth;
use DB;

class TeachersController extends Controller
{
    /** View variables **/

    private $template_vars;

    /** set View variables **/

    public function __construct()
    {

        $this->middleware('auth'); //only authorized users
        $this->template_vars['title'] = 'Teacher';
        $this->template_vars['titlepl'] = 'Teachers';
        $this->template_vars['role'] = 'admin';
    }    
    //
    public function index()
    {
        //show all teachers
        $teachers = User::where('role','=','teacher')->get();

        $teachers->load('programs');

        //return $teachers;

        return view('teachers.index', compact('teachers'))->with('template_vars', $this->template_vars);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        //populate relationships
        $teacher->load('programs', 'locations', 'groups');

        //set template vars
        $this->template_vars['name'] = $teacher->name;
        $this->template_vars['title_id'] = $teacher->id;        

        //return $program;
    
        return view('teachers.show', compact('teacher'), compact('teachers'))->with('template_vars', $this->template_vars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        //
        $teachers = User::where('role','=','teacher')->get();
        $teachers->load('programs');
        //set template vars
        $this->template_vars['name'] = $teacher->name;
        $this->template_vars['title_id'] = $teacher->id;  

        return view('teachers.edit', compact('teacher'), compact('teachers'))->with('template_vars', $this->template_vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        //
        $this->validate(request(), [
        		'id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'program_id' => 'required'
        ]);

        $teacher->update(request(['id','name', 'email', 'program_id']));

        \Session::flash('flash_message', 'Success!  Your edits have been saved.');

          return redirect('/teachers');
    }

       //API - AJAX return a specific teacher's data
    public function mydatatables()
    {
       
       $user_id = Auth::user()->id;
       $datatables = Groups::where('user_id', $user_id)->get();
       $datatables->load('observations');
       dd($datatables);

       return Datatables::of($datatables)->make(true);
    }

    public function teachdata()
    {
       
       $observations = DB::table('observations')->select('*')->whereIn('group_id', function($query){
            $query->select('id')->from('groups')->where('id', Auth::user()->id);
       })->get();;

       return view('teachers.observations', compact('observations'));
    }

    //return teacher's map data to view
    public function maps(Request $request)
    {

       $filter = Auth::user()->id;
       $observations = DB::table('observations')->select('*')->whereIn('group_id', function($query){
            $query->select('id')->from('groups')->where('user_id', Auth::user()->id);
       })->get();

       return view('teachers.maps', compact('observations', 'filter'));
    }

    //return teacher's map data to view
    public function charts(Request $request)
    {

       //get the id of logged in user
       $filter = Auth::user()->id;
       
       //get all of the user's groups
       $groups = Groups::select('id', 'name')->where('user_id', $filter)->get();
       
       //get all of the user's locations
       $locations = DB::table("observation_views")->select('location_id', 'location_name')->groupBy('location_id')->whereIn('group_id', function($query){
            $query->select('id')->from('groups')->where('user_id', Auth::user()->id);
       })->get();

       //get all of the observations for the user's groups
       $observations = DB::table("observation_views")->select('*')->whereIn('group_id', function($query){
            $query->select('id')->from('groups')->where('user_id', Auth::user()->id);
       })->get();

       return view('teachers.progress', compact('observations', 'filter', 'groups', 'locations'));
    }

}
