<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::with('type', 'technologies')->orderByDesc('created_at')->get();

        // dd($projects);

        if (count($projects) > 0) {
            return response()->json([
                'success' => true,
                'results' => $projects,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'result' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
