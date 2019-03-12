<?php

namespace App\Http\Controllers;

use App\ObservationView;
use App\Groups;
use App\Programs;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;

class observationViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
       
       $observations = ObservationView::all();

       return view('observations.index', compact('observations'));

    }

    //api for chart data for all observations
    public function chartbar(Request $request)
    {
       
      //programs
      $programs = DB::table("programs")->select('id','program')->whereIn('id', function($query){
            $query->select('program_id')->from('observation_views')->groupBy('program_id');
       })->get();

      //get all of the user's locations
      $locations = DB::table("observation_views")->select('location_id', 'location_name')->get();

      //get all of the observations for the user's groups
      $observations = ObservationView::all();

      return view('observations.progress', compact('observations', 'programs', 'locations'));
    }

     //api for all observation data
     public function datatables(Request $request)
     {
        $observations = ObservationView::select('id','type','species','location_name','howManySeen', 'photo')->get();

        return Datatables::of($observations)->make(true);
     }

     //api for map data for all observations
     public function mapdata(Request $request)
     {
        $observations = ObservationView::all()->groupBy('location_name');

        return $observations->toArray();
     }




}
