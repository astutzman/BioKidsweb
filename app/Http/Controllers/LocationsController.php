<?php

namespace App\Http\Controllers;
use Auth;

use App\Locations;
use Geocoder\Geocoder;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /** View variables **/

    private $template_vars;
    private $geocode;

    /** set View variables **/

    public function __construct()
    {

        $this->middleware('auth');
        $this->template_vars['title'] = 'Location';
        $this->template_vars['titlepl'] = 'Locations';
        $this->template_vars['role'] = 'teacher';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all locations for user
        //$locations = Locations::all();
        $locations = Locations::where('user_id', Auth::user()->id)->get();
        //dd($locations);
        $locations->load('teacher');

        return view('locations.index', compact('locations'))->with('template_vars', $this->template_vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new location
        $locations= Locations::all();

        return view('locations.create', compact('locations'))->with('template_vars', $this->template_vars);
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
        $request['user_id'] = Auth::user()->id;
        $this->validate(request(), [
        'name' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state'=> 'required',
        'postal_code' => 'required',

        ]);

        \Session::flash('flash_message', 'Success!  Your new location has been added.');

        Locations::create(request(['name', 'address', 'city', 'state', 'description', 'postal_code', 'longitude', 'latitude', 'user_id']));

        return redirect('/locations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Locations $location)
    {
        //get data
        $locations = Locations::where('user_id', Auth::user()->id)->get();
        
        //set template vars
        $this->template_vars['name'] = $location->name;
        $this->template_vars['title_id'] = $location->id;

        //$locations = Locations::all();

        return view('locations.show', compact('location'), compact('locations'))->with('template_vars', $this->template_vars);        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Locations $location)
    {
        //
        $locations = Locations::where('user_id', '=', Auth::user()->id);
        //set template vars
        $this->template_vars['name'] = $location->name;
        $this->template_vars['title_id'] = $location->id;        

        return view('locations.edit', compact('location'), compact('locations'))->with('template_vars', $this->template_vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locations $location)
    {
        //update record
        $this->validate(request(), [
                'name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state'=> 'required',
                'postal_code' => 'required',

        ]);

        //Get latitude and longitude
        $geo_address = $location->address.' '.$location->city.', '.$location->state;

        $geocoder = app('geocoder')->geocode($geo_address)->dump('wkt');
        
        if($geocoder)
        {
            $location->longitude = substr($geocoder, 8, 10);
            $location->latitude = substr($geocoder, 19,9);
        }
        else
        {
            $location->latitude = null;
            $location->longitude = null;
        }

        //dd($location->longitude);
        $location->update(request(['id','name', 'address', 'city', 'state', 'postal_code', 'longitude', 'latitude', 'description']));

        \Session::flash('flash_message', 'Success!  Your edits have been saved.');

          return redirect('/locations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locations $locations)
    {
        //
    }
}
