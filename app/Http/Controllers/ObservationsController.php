<?php

namespace App\Http\Controllers;

use App\Observations;
use App\Programs;
use App\Groups;
use DB;
use Auth;
use Geocoder\Geocoder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;

class ObservationsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
       
       $observations = Observations::all();

       return view('observations.index', compact('observations'));
    }

    
    //API - AJAX return of all Observation data
    public function datatables(Request $request)
    {
       
        $url = $request->fullurl();

        //check path
        if(strpos($url,'teach')) //teacher specific data
        {
            $user_id = Auth::user()->id;
            $user_groups = DB::table('groups')->select('id as group_id')->where('user_id', $user_id)->get();
            $groups = "";
            foreach($user_groups as $g){$groups .= $g->group_id.',';}
            $groups = substr($groups, 0, -1); //remove last comma

            $datatables = Observations::wherein('group_id', [$groups])->with('groups','groups.users.programs')->get();
        }
        else//all data
        {
            $datatables = Observations::with('groups','groups.users.programs')->get();
        }

       return Datatables::of($datatables)->make(true);
    }

    //return all map data to view
    public function maps(Request $request)
    {

       $filter = $request->filter;
       $observations = Observations::all();

       return view('observations.maps', compact('observations', 'filter'));
    }

    //API - AJAX return of all Observation Map data
    public function mapdata(Request $request)
    {
       
       $filter = $request->filter;
       
       $mapdata = null;

           if(!$filter)
           {
                
                if($request->type) //get teacher map data
                {
                $user_id = Auth::user()->id;
                $user_prog = DB::table('users')->select('program_id')->where('id', $user_id)->first();

                $mapdata = Programs::where('id', $user_prog->program_id)->get();
                $mapdata->load('users', 'users.groups', 'users.groups.observations.pgroups');
                }
                else //get all data
                {
                $mapdata = Programs::all();
                $mapdata->load('users', 'users.groups', 'users.groups.observations.pgroups');
                }

           }
           elseif ($filter === 'observations') 
           {
                $mapdata = Observations::all();

                $mapdata->load('groups', 'groups.users.programs');
           }
       

       return $mapdata->toArray();
    }
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
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Observations  $observations
     * @return \Illuminate\Http\Response
     */
    public function show(Observations $observations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Observations  $observations
     * @return \Illuminate\Http\Response
     */
    public function edit(Observations $observations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Observations  $observations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observations $observations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Observations  $observations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observations $observations)
    {
        //
    }
}
