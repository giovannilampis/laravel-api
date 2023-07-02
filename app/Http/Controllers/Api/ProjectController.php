<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(['category', 'technologies'])->get()->toArray();

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show($slug){
        $project = Project::with('category', 'technologies')->where('title', $slug)->first();

        if( $project ){
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        }else {
            return response()->json([
                'success' => false,
                'error' => 'Non ci sono progetti'
            ])->setStatusCode(404);
        }
    }

}
