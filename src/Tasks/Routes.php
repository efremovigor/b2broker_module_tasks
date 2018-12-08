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
                '/tasks/create' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\SupportTaskController@getCreate',
                '/tasks' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\SupportTaskController@getTasks',
                '/tasks/{id}' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\SupportTaskController@getTask',
            ],
            'post' => [
                '/tasks' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\SupportTaskController@postCreate',
            ]
        ];
    }

    public static function getApiRoutes(){
        return [
            'get' => [
                '/tasks' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\Api\SupportTaskController@all',
                '/tasks/{id}' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\Api\SupportTaskController@read',
            ],
            'post' => [
                '/tasks' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\Api\SupportTaskController@create',
            ],
            'put' => [
                '/tasks/{id}' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\Api\SupportTaskController@update',
            ],
            'delete' => [
                '/tasks/{id}' => '\Symfony\Component\HttpKernel\Log\Packet\Controller\Api\SupportTaskController@delete',
            ]
        ];
    }
}