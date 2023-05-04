<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $results = Project::with('type.projects')->get();

        return response()->json([
            'results' => $results,
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No project found'
            ]);
        }
    }
}
