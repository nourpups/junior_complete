<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\User;

class TaskController extends Controller
{
   public function __construct()
   {
      $this->authorizeResource(Task::class, 'task');
   }

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
       session(['previous_page' => url()->full()]);

       $tasks = auth()->user()->tasks()->with(['user', 'project'])->latest()->paginate(12);

       if(auth()->user()->hasRole('Super Admin'))
        {
            $tasks = Task::with(['user', 'project'])->latest()->paginate(12);

        }

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $projects = Project::get();

        return view('tasks.create', compact('users', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        Task::create($task = ($request->validated() + ['status' => Status::IN_PROGRESS]));

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'success',
            'message' => "Project «$task[title]» was created successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        $users = User::get();
        $projects = Project::get();

        return view('tasks.edit', compact('task', 'users', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
     $task->update($request->validated());

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'success',
            'message' => "Project «$task[title]» was updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'danger',
            'message' => "Project «$task[title]» was deleted"
        ]);
    }
}
