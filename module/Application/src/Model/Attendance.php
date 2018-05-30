<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 26/05/18
 * Time: 11.14
 */

namespace Application\Model;


class Attendance
{
    public $id;
    public $meeting;
    public $location;
    public $time;
    public $isSuccess;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : "";
        $this->meeting = !empty($data['meeting']) ? $data['meeting'] : "";
        $this->location = !empty($data['location']) ? $data['location'] : "";
        $this->time = !empty($data['time']) ? $data['time'] : "";
        $this->isSuccess = false;
    }
}