<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 28/05/18
 * Time: 11.04
 */

namespace Application\Model;


class Login
{
    public $id;
    public $action;
    public $time;
    public $isSuccess = false;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : "";
        $this->action = !empty($data['action']) ? $data['action'] : "";
        $this->time = !empty($data['time']) ? $data['time']: "";
        //$this->isSuccess = !empty($data['isSuccess']) ? $data['isSuccess'] : "";
    }
}