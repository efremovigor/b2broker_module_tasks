<?php

namespace Tasks\Controller;

use Illuminate\Support\Facades\Request;
use Tasks\Model\SupportTask;

class SupportTaskController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function getTasks()
    {
        $tasks = SupportTask::getActive();
        return view()->make('tasks', compact('tasks'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function getTask($id)
    {
        $task = SupportTask::findActive($id);

        return view()->make('task_view', compact('task'));
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function getCreate()
    {
        return view()->make('tasks_create');
    }

    /**
     * @param Request $request
     * @param SupportTask $task
     * @return \Illuminate\Contracts\View\View
     */
    public function postCreate(Request $request, SupportTask $task)
    {
        try {
            $task->newTask($request::post()['title'], $request::post()['body']);
            $msg = $task->save() ? 'Task sended' : 'Unknow error';
        } catch (\Throwable $exception) {

        }
        return view()->make('tasks_create', compact('msg'));
    }
}
