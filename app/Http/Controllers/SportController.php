<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;

use Illuminate\Support\Facades\Session;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return view('sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRequest $request)
    {
        Sport::create($request -> validated());

        Session::flash('success', 'Sport added successfully');
        return redirect() -> route('sports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        $athletes = $sport->athletes;
        return view('sports.show', ['sport'=>$sport, 'athletes'=>$athletes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSportRequest $request, Sport $sport)
    {
        $sport -> update($request->validated());

        Session::flash('success', 'Sport updated succesfully');
        return redirect()-> route('sports.show', compact('sport'));
    }

    /**
     * Remove the specified resource from strorage
     */
    public function trash($id){
        Sport::destroy($id);
        Session::flash('success', 'Sport trashed successfully');
        return redirect() -> route('sports.index');
    }

    public function destroy($id)
    {
        $sport = Sport::withTrashed()-> where('id', $id) -> first();
        $sport -> forceDelete();
        Session::flash('success', 'Sport deleted successfully');
        return redirect() -> route ('sports.index');
    }

    public function restore($id)
    {
        $sport = Sport::withTrashed()-> where('id', $id) -> first();
        $sport -> restore();
        Session::flash('success', 'Sport restored successfully');
        return redirect() -> route ('sports.index');
    }
}
