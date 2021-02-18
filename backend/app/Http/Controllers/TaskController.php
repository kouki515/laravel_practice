<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $folders = Folder::all();

        // 選ばれたフォルダを取得する
        $current_foldder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_foldder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_foldder->id,
            'tasks' => $tasks,
        ]);
    }
}
