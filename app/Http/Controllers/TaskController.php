<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller {
    //

    public function postData(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'date' => 'required',
            'time' => 'required'
            
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = $this->checkUniqueTask($request);
        if ($task == true) {

            return redirect()->back()->withErrors(['msg' => 'Task Already Exits']);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->date = $request->date;
        $task->time = $request->time;
        
        $task->save();

        return redirect('/');
    }

    public function deleteTask($id) {

        Task::findOrFail($id)->delete();

        return redirect('/');
    }

    public function checkUniqueTask($request) {

        return Task::where(['date' => $request->date, 'time' => $request->time])->exists();
    }
}
