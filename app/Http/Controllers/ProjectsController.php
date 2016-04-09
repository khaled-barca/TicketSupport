<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;

class ProjectsController extends Controller
{
    //
        public function store(CreateProjectRequest $request){
        $project = new Project;
        $project->name = $request->name;
        $project->save();
        return redirect(action('HomeController@index2'));
    }
        public function create(){
        return view('projects.create');
    }
        public function show(Project $project){
        return view('project');
    }        
        public function update(CreateProjectRequest $request, Project $project){
        $project->name = $request->name;
        $project->save();
        return redirect(action('HomeController@index2'));
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
