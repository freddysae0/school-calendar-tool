<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'subject_id' => 'required|string|max:255',
        ]);

        $subject_id = null;
        if ($request->subject_id == "new") {


            $request->validate([
                'name' => 'required|string|max:255|unique:subjects',
            ]);
            $subject_id = Subject::create([
                'name' => $request->name
            ]);
            $subject_id = $subject_id->id;
        } else {


            $request->validate([
                "day" => "required",
                "turn" => "required"
            ]);
            $subject_id = $request->subject_id;
        }

        $group = Group::find($request->group_id);

        $group->subjects()->attach($subject_id, [
            'day' => $request->day,
            'turn' => $request->turn
        ]);
        return redirect()->route('dashboard.schedule', $group->id);
    }


    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject, Group $group, $day, $turn)
    {
        // Eliminar el registro de la tabla pivote 'group_subject'

        DB::table('group_subject')
            ->where('group_id', $group->id)
            ->where('subject_id', $subject->id)
            ->where('day', $day)
            ->where('turn', $turn)
            ->delete();

        return redirect()->back();
    }
}
