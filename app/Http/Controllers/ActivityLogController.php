<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Manager']);
    }

    public function index()
    {
        $logs = ActivityLog::with('user')
                          ->latest()
                          ->paginate(20);

        return view('manager.activity-logs.index', compact('logs'));
    }

    // Add the managerIndex method
    public function managerIndex()
    {
        $activities = ActivityLog::with('user')
                               ->latest()
                               ->paginate(15);

        return view('manager.activities.index', compact('activities'));
    }

    public static function log($action, $description, $model = null)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'description' => $description,
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model ? $model->id : null
        ]);
    }
}