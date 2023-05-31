<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('type_id')) {
            $queryParams = $request->all();

            $projects = Project::with('type', 'technologies')->where('type_id', $queryParams['type_id'])->orderByDesc('created_at')->get();
        } else {
            $projects = Project::with('type', 'technologies')->orderByDesc('created_at')->get();
        }

        $types = Type::all();

        if (count($projects) > 0) {
            return response()->json([
                'success' => true,
                'results' => $projects,
                'types' => $types,
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
