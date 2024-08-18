<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Http\Requests\StoreAthleteRequest;
use App\Http\Requests\UpdateAthleteRequest;
use App\Models\Sport;
use Illuminate\Support\Facades\Session;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $athletes = Athlete::all();
        return view('athletes.index', compact('athletes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('athletes.create', ['sports' => Sport::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAthleteRequest $request)
    {
        $athlete = Athlete::create($request -> validated());

        foreach($request->sports as $sport)
        {
            $athlete->sports()->attach($sport);
        }

        Session::flash('success', 'Athlete added successfully');
        return redirect() -> route('athletes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Athlete $athlete)
    {
        //$athlete = Athlete::find($athlete->id);
        $sports = $athlete->sports;
        return view('athletes.show', ['athlete'=>$athlete, 'sports'=>$sports]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Athlete $athlete)
    {
        $all_sports = Sport::all();
        $sports = array();
        foreach($athlete->sports as $sport)
        {
            array_push($sports, $sport->id);
        }
        return view('athletes.edit', ['athlete'=>$athlete, 'sports'=>$sports, 'all_sports'=>$all_sports]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAthleteRequest $request, Athlete $athlete)
    {
        $athlete -> update($request->validated());
        $athlete->sports()->sync($request->sports);
        
        Session::flash('success', 'Athlete updated succesfully');
        return redirect()-> route('athletes.show', compact('athlete'));
    }

    /**
     * Remove the specified resource from strorage
     */
    public function trash($id){
        Athlete::destroy($id);
        Session::flash('success', 'Athlete trashed successfully');
        return redirect() -> route('athletes.index');
    }

    public function destroy($id)
    {
        $athlete = Athlete::withTrashed()-> where('id', $id) -> first();
        $athlete -> forceDelete();
        Session::flash('success', 'Athlete deleted successfully');
        return redirect() -> route ('athletes.index');
    }

    public function restore($id)
    {
        $athlete = Athlete::withTrashed()-> where('id', $id) -> first();
        $athlete -> restore();
        Session::flash('success', 'Athlete restored successfully');
        return redirect() -> route ('athletes.index');
    }
}
