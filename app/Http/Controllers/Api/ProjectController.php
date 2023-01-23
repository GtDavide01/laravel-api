<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('types_id')) {
            $projects = Project::with('technologies', 'type')->where('types_id', $request->types_id)->paginate(3);
        } else {
            $projects = Project::with('technologies', 'type')->paginate(3);
        }
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('technologies', 'type')->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => "Nessun progetto trovato",
            ]);
        }
    }
}
