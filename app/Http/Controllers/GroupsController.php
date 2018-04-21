<?php

namespace App\Http\Controllers;

use App\Groups;
use App\Trackers;
use Auth;

use Illuminate\Http\Request;

class GroupsController extends Controller
{
 
     /** View variables **/

    private $template_vars;

    /** set View variables **/

    public function __construct()
    {

        $this->middleware('auth');
        $this->template_vars['title'] = 'Group';
        $this->template_vars['titlepl'] = 'Groups';
        $this->template_vars['role'] = 'teacher';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all groups
        $groups = Groups::where('user_id', Auth::user()->id)->get();

        $groups->load('teachers');
        $groups->load('trackers');

        //return $groups;

        return view('groups.index', compact('groups'))->with('template_vars', $this->template_vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new location
        $groups= Groups::all();
        $trackers = Trackers::all();

        return view('groups.create', compact('groups'), compact('trackers'))->with('template_vars', $this->template_vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //save new record
        $request['user_id'] = Auth::user()->id;
        $this->validate(request(), [
        'name' => 'required|unique:groups,name,except,id',
        'unique_code' => 'required|unique:groups,unique_code|max:8',
        ]);

        \Session::flash('flash_message', 'Success!  Your new group has been added.');

        Groups::create(request(['name', 'unique_code', 'tracker_id','description','user_id']));

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(Groups $group)
    {
        //show one group
        //get data
        $groups = Groups::where('user_id', Auth::user()->id)->get();
       
        //set template vars
        $this->template_vars['name'] = $group->name;
        $this->template_vars['title_id'] = $group->id;

        return view('groups.show', compact('group'), compact('groups'))->with('template_vars', $this->template_vars);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $group)
    {
        //save one record
        $groups = Groups::all();
        $groups->load('trackers');
        $trackers = Trackers::all();

        //set template vars
        $this->template_vars['name'] = $group->name;
        $this->template_vars['title_id'] = $group->id;

        return view('groups.edit', compact('group'), compact('groups'))->with('template_vars', $this->template_vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $group)
    {
        //
            $this->validate(request(), [
                'name' => 'required|unique:groups,name,'.$group->id,
                'unique_code' => 'required|unique:groups,unique_code,'.$group->id,
        ]);

        $group->update(request(['id','name', 'unique_code', 'description']));

        \Session::flash('flash_message', 'Success!  Your edits have been saved.');

          return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $groups)
    {
        //
    }
}
