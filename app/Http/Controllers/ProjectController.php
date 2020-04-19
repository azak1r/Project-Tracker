<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Material;
use App\Models\ProjectMaterial;
use Illuminate\Http\Request;
use Seat\Eseye\Eseye;
use Seat\Eseye\Containers\EsiAuthentication;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index')->with(compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $char = auth()->user();

        $authentication = new EsiAuthentication([
            'client_id'     => env('EVEONLINE_KEY'),
            'secret'        => env('EVEONLINE_SECRET'),
            'access_token'  => $char->eve_token,
            'refresh_token' => $char->refreshToken,
            'scopes'        => ['esi-assets.read_assets.v1'],
        ]);

        $esi = new Eseye($authentication);


        $character_assets = $esi->invoke('get','/characters/{character_id}/assets/', [
            'character_id' => $char->id,
        ]);

        print_r($character_assets);

        //return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Parse the blueprint input
        $data = $request->input('materialInput');
        $first = str_replace("\r\n", "&",$data);
        $output = str_replace(" x ", " =",$first);
        parse_str($output, $array);
        $flipped = array_flip($array);
        $output = str_replace("_","",$flipped);

        $object = json_decode(json_encode($output), FALSE);

        // Save new project
        $project = new Project;

        $project->projectName = $request->input('projectName');
        $project->addedBy = $request->input('character');

        $project->save();

        // Save project materials
        $project = Project::latest('created_at')->first();

        foreach($object as $material=>$quantity){
            $materials = new ProjectMaterial;
            
            $materials->project_id = $project->id;
            $itemID = Material::where('name','=',$material)->first();
            $materials->material_id = $itemID->id;
            $materials->material_cat = $itemID->category;
            $materials->material_name = $material;
            $materials->quantity = $quantity;

            $materials->save();

        }

        flash("Project created!")->success();
            return redirect()->route('projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $project = Project::where('id', $id)->first();
        if(!$project) {
            flash("Project doesn't exist")->error();
            return redirect()->route('projects');
        }
        $materials = $project->projectMaterial;

        return view('projects.show')->with(compact('materials','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
