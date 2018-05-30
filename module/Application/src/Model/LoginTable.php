<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 28/05/18
 * Time: 11.05
 */

namespace Application\Model;


use Zend\Db\TableGateway\TableGatewayInterface;

class LoginTable
{
    private $tableGateWay;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateWay = $tableGateway;
    }

    public function saveLogin(Login $login)
    {
        $data = [
            'id' => $login->id,
            'action' => $login->action,
            'time' => $login->time
        ];
        $isSuccess = $this->tableGateWay->insert($data) ? true : false;
        $data['success'] = $isSuccess;
        return $data;
    }
}