<?php
/**
 * Created by PhpStorm.
 * User: igore
 * Date: 08.12.18
 * Time: 15:58
 */

namespace Tasks\Controller\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Log\Packet\Model\SupportTask;


class SupportTaskController
{
    public function create(Request $request, SupportTask $task)
    {
        try {
            $task->newTask($request::post()['title'], $request::post()['body']);
            $msg = $task->save() ? 'Task sended' : 'Unknow error';
        } catch (\Throwable $exception) {
            return $this->getFail(['error' => 'Bad request'], 400);
        }
        return $this->getSuccess(compact('task'), 201);
    }

    public function all()
    {
        $tasks = SupportTask::getActive();
        return $this->getSuccess(compact('tasks'));
    }

    public function read($id)
    {
        $task = SupportTask::findActive($id);
        if ($task === null) {
            return $this->getFail(['error' => 'Not found'], $code = 404);
        }
        return $this->getSuccess(compact('task'));
    }

    public function update($id, SupportTask $task)
    {
        $task = SupportTask::findActive($id);
        if ($task === null) {
            return $this->getFail(['error' => 'Not found'], $code = 404);
        }
        if ($task->update(Request::post()) === true) {
            return $this->getSuccess(compact('task'), 200);
        }
        return $this->getFail(['error' => 'Not found'], 400);
    }

    public function delete($id, SupportTask $task)
    {
        $task = SupportTask::findActive($id);
        if ($task === null) {
            return $this->getFail(['error' => 'Not found'], $code = 404);
        }
        if ($task->delete(Request::post()) === true) {
            return $this->getSuccess(null, 200);
        }
        return $this->getFail(['error' => 'Not found'], 400);
    }

    private function getSuccess(?array $data, $code = 200): JsonResponse
    {
        return response()->json(['success' => true, 'status' => 'Успешно', 'data' => $data], $code);
    }

    private function getFail(?array $data, $code = 404): JsonResponse
    {
        return response()->json(['success' => false, 'status' => 'Ошибка', 'data' => $data], $code);
    }
}