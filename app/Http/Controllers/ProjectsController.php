<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\Ticket;
use App\User;
class ProjectsController extends Controller
{
    //
        public function store(CreateProjectRequest $request){
        $project = new Project;
        $project->name = $request->name;
        $project->save();
        $tickets = array();
        $users = array();
        return view('projects.show', [
        'tickets' => $tickets,
        'project' => $project,
        'users' => $users
    ]);
    }
        public function create(){
        return view('projects.create');
    }
        public function show(Project $project){
        $tickets = Ticket::where('project_id',$project->id)->get();
        $users = array();
            foreach($tickets as $ticket){
                $user = User::find($ticket->support_id);
                array_push($users,$user);
        }
        return view('projects.show', [
        'tickets' => $tickets,
        'project' => $project,
        'users' => $users
    ]);
    }        
        public function update(CreateProjectRequest $request, Project $project){
        $project->name = $request->name;
        $project->save();
        $tickets = Ticket::where('project_id',$project->id)->get();
        $users = array();
            foreach($tickets as $ticket){
                $user = User::find($ticket->support_id);
                array_push($users,$user);
        }
         return view('projects.show', [
        'tickets' => $tickets,
        'project' => $project,
        'users' => $users
    ]);
    }
        public function destroy(Project $project){
        $project->delete();
        return redirect(action('HomeController@index2'));
    }
        public function edit(Project $project){
         return view('projects.edit')
            ->with('project', $project);
    }
}
