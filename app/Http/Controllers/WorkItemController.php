<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\WorkItem;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workitems = WorkItem::all();
        return view('workitems.index')->with('workitems', $workitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workouts = Workout::all();
        $exercises = Exercise::all();
        return view('workitems.create')->with([
            'workouts' => $workouts,
            'exercises' => $exercises
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'workout_id' => 'required',
            'exercise_id' => 'required',
            'satz' => 'required',
            'wdh' => 'required',
            'gewicht' => 'required'
        ]);
        WorkItem::create([
            'workout_id' => $request->workout_id,
            'exercise_id' => $request->exercise_id,
            'satz' => $request->satz,
            'wdh' => $request->wdh,
            'gewicht' => $request->gewicht
        ]);
        return redirect()->route('workitems.index')->with('message', 'WorkItem created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkItem  $workItem
     * @return \Illuminate\Http\Response
     */
    public function show(WorkItem $workitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkItem  $workItem
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkItem $workitem)
    {
        $workouts = Workout::all();
        $exercises = Exercise::all();
        return view('workitems.edit')->with([
            'workitem' => $workitem,
            'workouts' => $workouts,
            'exercises' => $exercises
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkItem  $workItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkItem $workitem)
    {
        $workitem->update([
            'workout_id' => $request->workout,
            'exercise_id' => $request->exercise,
            'satz' => $request->satz,
            'wdh' => $request->wdh,
            'gewicht' => $request->gewicht
        ]);
        return redirect()->route('workitems.index')->with('message', 'WorkItem updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkItem  $workItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkItem $workitem)
    {
        $workitem->delete();
        return redirect()->route('workitems.index')->with('message', 'WorkItem deleted successfully');
    }
}
