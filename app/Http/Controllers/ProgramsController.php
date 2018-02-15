<?php

namespace App\Http\Controllers;

use App\Programs;
use Geocoder\Geocoder;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /** View variables **/

    private $template_vars;
    private $geocode;

    /** set View variables **/

    public function __construct()
    {

        $this->middleware('auth'); //only authorized users
        $this->template_vars['title'] = 'Program';
        $this->template_vars['titlepl'] = 'Programs';
        $this->template_vars['role'] = 'admin';

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all programs
        $programs = Programs::all();

        return view('programs.index', compact('programs'))->with('template_vars', $this->template_vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new program
        $programs = Programs::all();

        return view('programs.create', compact('programs'))->with('template_vars', $this->template_vars);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->middleware('auth');
        $this->validate(request(), [
                'program' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state'=> 'required',
                'postal_code' => 'required',

        ]);
        
        //$geo_address = "$request->city, $request->state";

        //return app('geocoder')->geocode('Los Angeles, CA');

        Programs::create(request(['program', 'address', 'city', 'state', 'postal_code']));

        return redirect('/programs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function show(Programs $program)
    {
        //
        $program->load('users');
        //set template vars
        $this->template_vars['name'] = $program->program;
        $this->template_vars['title_id'] = $program->id;
    
        return view('programs.show', compact('program'), compact('programs'))->with('template_vars', $this->template_vars);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Programs $program)
    {
        //
        $programs = Programs::all();
        //set template vars
        $this->template_vars['name'] = $program->program;
        $this->template_vars['title_id'] = $program->id;        

        return view('programs.edit', compact('program'), compact('programs'))->with('template_vars', $this->template_vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programs $program)
    {
        //
        $this->validate(request(), [
                'program' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state'=> 'required',
                'postal_code' => 'required',

        ]);

        //Get latitude and longitude
        $geo_address = $program->address.' '.$program->city.', '.$program->state;

        $geocoder = app('geocoder')->geocode($geo_address)->dump('wkt');
        if($geocoder)
        {
            $program->longitude = substr($geocoder, 8, 10);
            $program->latitude = substr($geocoder, 19,9);
        }
        else
        {
            $program->latitude = null;
            $program->longitude = null;
        }

        //dd(app('geocoder')->geocode($program->city, $program->state)->get());

        $program->update(request(['id','program', 'address', 'city', 'state', 'postal_code', 'longitude', 'latitude']));

        \Session::flash('flash_message', 'Success!  Your edits have been saved.');

          return redirect('/programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programs $programs)
    {
        //
    }
}
