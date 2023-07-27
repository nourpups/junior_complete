<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Events\PinTaskToUser;
use App\Events\PinUserToProject;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\User;
use App\Notifications\NewTaskNotification;

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
      session(['index_page' => url()->full()]);

      if (auth()->user()->hasRole('Super Admin')) {
         $tasksQuery = Task::query();
      } else {
         $tasksQuery = auth()->user()->tasks();
      }
      $tasks = $tasksQuery->with(['user', 'project'])->latest()->paginate(12);

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
      $data = $request->validated();

      $task = Task::create($data + ['status' => Status::IN_PROGRESS]);

      $user = User::find($data['user_id']);

      event(new PinTaskToUser($user, $task));

      return redirect(session('index_page'))->with('flash', [
            'class'   => 'success',
            'message' => "Project «$task[title]» was created successfully",
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
      $data = $request->validated();

      if($task->id == $data['user_id']) {
         $user = User::find($data['user_id']);
         event(new PinTaskToUser($user, $task));
      }

      $task->update($data);

      return redirect(session('index_page'))->with('flash', [
            'class'   => 'success',
            'message' => "Project «$task[title]» was updated successfully",
      ]);
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Task $task)
   {
      $task->delete();

      return redirect(session('index_page'))->with('flash', [
            'class'   => 'danger',
            'message' => "Project «$task[title]» was deleted",
      ]);
   }

}
