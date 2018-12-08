<?php
/**
 * Created by PhpStorm.
 * User: igore
 * Date: 08.12.18
 * Time: 15:43
 */
namespace Tasks;

class Routes
{
    public static function getRoutes(){
        return [
            'get' => [
                '/tasks/create' => '\Tasks\Controller\SupportTaskController@getCreate',
                '/tasks' => '\Tasks\Controller\SupportTaskController@getTasks',
                '/tasks/{id}' => '\Tasks\Controller\SupportTaskController@getTask',
            ],
            'post' => [
                '/tasks' => '\Tasks\Controller\SupportTaskController@postCreate',
            ]
        ];
    }

    public static function getApiRoutes(){
        return [
            'get' => [
                '/tasks' => '\Tasks\Controller\Api\SupportTaskController@all',
                '/tasks/{id}' => '\Tasks\Controller\Api\SupportTaskController@read',
            ],
            'post' => [
                '/tasks' => '\Tasks\Controller\Api\SupportTaskController@create',
            ],
            'put' => [
                '/tasks/{id}' => '\Tasks\Controller\Api\SupportTaskController@update',
            ],
            'delete' => [
                '/tasks/{id}' => '\Tasks\Controller\Api\SupportTaskController@delete',
            ]
        ];
    }
}