<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\Activity;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Carbon\Carbon;
use Illuminate\View\View;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index task', ['only' => ['index']]);
        $this->middleware('permission:show task', ['only' => ['show']]);
        $this->middleware('permission:create task', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit task', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete task', ['only' => ['delete', 'destroy']]);
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::with('user')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $users = User::all();
        return view('admin.tasks.create', compact('users'));

         $projects = Project::all();
        return view('admin.tasks.create', compact('projects'));
        
        $activities = Activity::all();
        return view('admin.tasks.create', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request

     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task();
        $task->text = $request->text;
        $task->startdate = $request->stardate;
        $task->enddate = $enddate;
        $task->user_id = $request->user_id;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->save();


        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->task_id = $task_id;
        $project->save();

        $activity = new Activity();
        $activity->name = $request->name;
        $activity->task_id = $task_id;
        $activity->save();
    

        return  redirect()->route('admin.tasks.index')->with('status', 'Task is toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return View
     */
    public function show(Task $task)
    {
        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return View
     */
    public function edit(Task $task): View
    {
        $users = User::all();
        return view('admin.tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
       
        $task->text = $request->text;
        $task->startdate = $request->stardate;
        $task->enddate = $request->enddate;
        $task->user_id = $request->user_id;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->save();

        return redirect()->route('tasks.edit')->with('status', 'Task geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
