<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public $config;

    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                Rule::unique('groups')->where('school_id', $request->school_id),
            ],
            'is_active' => 'required'
        ]);
        Group::create($request->all());

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($schoolname, $group_code)
    {
        $group = Group::where('code', $group_code)->first();
        $subjectsGBDay = $group->subjects()->orderBy('turn')->get()->groupBy('pivot.day');
        $result = [];
        $turns = [];

        $days = ['', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];


        $t = "";
        foreach ($subjectsGBDay as $day => $subjects) {
            foreach ($subjects as $subject) {
                if (!in_array($subject['pivot']['turn'], $turns)) {
                    $turns[] = $subject['pivot']['turn'];
                }
            }
        }

        sort($turns);


        foreach ($turns as $turn) {
            $t = $turn;
            for ($i = 1; $i <= 7; $i++) {
                $result[$i][$t] = null;
            }
        }
        #dd($result);

        // Iterar por cada día en el arreglo original
        foreach ($subjectsGBDay as $day => $subjects) {
            $dayData = [];

            // Extraer turnos y subject_id
            foreach ($subjects as $subject) {
                $result[$day][$subject['pivot']['turn']] = $subject['pivot']['subject_id'];
            }
        }


        // Check if group exists

        if (!$group) {
            return redirect()->route('dashboard')->with('error', 'Group not found.');
        }

        if ($group->is_active == true) {
            return view('calendar', compact('group', 'turns', 'result', 'days'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Group is inactive.');;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function editSchedule(Group $group)
    {
        $days = [
            1 => "Monday",
            2 => "Tuesday",
            3 => "Wednesday",
            4 => "Thursday",
            5 => "Friday",
            6 => "Saturday",
            7 => "Sunday",
        ];
        return view("schedule", compact("group", "days"));
    }

    public function edit(Group $group) {}

    public function update(Request $request, Group $group)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                Rule::unique('groups')->where('school_id', $request->school_id),
            ],
            'is_active' => 'required'
        ]);
        $group->update($request->all());


        return redirect()->route('dashboard');
    }

    public function destroy(Group $group): JsonResponse
    {
        $group->delete();
        return response()->json(['success' => 'Post deleted successfully.']);
    }
}
