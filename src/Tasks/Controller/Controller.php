<?php
/**
 * Created by PhpStorm.
 * User: igore
 * Date: 09.12.18
 * Time: 15:56
 */

namespace Tasks\Controller;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}