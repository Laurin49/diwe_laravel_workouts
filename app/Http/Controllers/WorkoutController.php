<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkoutRequest;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categories = ['Rücken', 'Schultern', 'Brust', "Bizeps", "Trizeps", "Beine"];

    public function index()
    {
        $workouts = Workout::orderBy('updated_at', 'desc')->paginate(5);
        return view('workouts.index', compact('workouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('workouts.create')->with('categories', $this->categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkoutRequest $request)
    {
        echo $request->category;
        Workout::create([
            'name' => $request->name,
            'description' => $request->description,
            'datum' => $request->datum,
            'category' => $request->category
        ]);
        // Workout::create($request->validated());
        return redirect()->route('workouts.index')->with('message', $request->category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function edit(Workout $workout)
    {
        return view('workouts.edit')->with([
            'workout' => $workout,
            'categories' => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(WorkoutRequest $request, Workout $workout)
    {
        $workout->update([
            'name' => $request->name,
            'description' => $request->description,
            'datum' => $request->datum,
            'category' => $request->category
        ]);
        return redirect()->route('workouts.index')->with('message', 'Workout updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workout $workout)
    {
        $workout->delete();
        return redirect()->route('workouts.index')->with('message', 'Workout deleted successfully');
    }
}
