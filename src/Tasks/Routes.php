<?php
/**
 * Created by PhpStorm.
 * User: igore
 * Date: 08.12.18
 * Time: 15:43
 */

namespace Tasks;

use Tasks\Controller\SupportTaskController as Task;
use Tasks\Controller\Api\SupportTaskController as TaskApi;

class Routes
{
    public static function getRoutes()
    {
        return [
            'get' => [
                '/tasks/create' => Task::class . '@getCreate',
                '/tasks' => Task::class . '@getTasks',
                '/tasks/{id}' => Task::class . '@getTask',
            ],
            'post' => [
                '/tasks' => Task::class . '@postCreate',
            ]
        ];
    }

    public static function getApiRoutes()
    {
        return [
            'get' => [
                '/tasks' => TaskApi::class . '@all',
                '/tasks/{id}' => TaskApi::class . '@read',
            ],
            'post' => [
                '/tasks' => TaskApi::class . '@create',
            ],
            'put' => [
                '/tasks/{id}' => TaskApi::class . '@update',
            ],
            'delete' => [
                '/tasks/{id}' => TaskApi::class . '@delete',
            ]
        ];
    }
}