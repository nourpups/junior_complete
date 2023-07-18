<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;

class ProjectController extends Controller
{
   public function __construct()
   {
      $this->authorizeResource(Project::class, 'project');
   }

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['previous_page' => url()->full()]);

        $projects = Project::where('user_id', auth()->id())->with(['user', 'client'])->latest()->paginate(12);

       if(auth()->user()->hasRole('Super Admin'))
       {
          $projects = Project::with(['user', 'client'])->latest()->paginate(12);
       }

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $clients = Client::get();

        return view('projects.create', compact('users', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($project = ($request->validated() + ['status' => Status::IN_PROGRESS]));

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'success',
            'message' => "Project «$project[title]» was created successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $users = User::get();
        $clients = Client::get();

        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $project->update($request->validated());

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'success',
            'message' => "Project «$project[title]» was updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->tasks()->delete();
        $project->delete();

        return redirect(session('previous_page'))->with('flash', [
            'class' => 'danger',
            'message' => "Project «$project[title]» was deleted"
        ]);
    }
}
