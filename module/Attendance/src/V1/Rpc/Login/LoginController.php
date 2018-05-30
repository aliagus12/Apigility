<?php

namespace Attendance\V1\Rpc\Login;

use Application\Model\Login;
use Application\Model\LoginTable;
use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class LoginController extends AbstractActionController
{

    /**
     * LoginController constructor.
     */
    private $tableLogin;

    public function __construct($tableLogin)
    {
        $this->tableLogin = $tableLogin;
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $bodyID = Json::decode($request->getContent())->ID;
            $bodyAction = Json::decode($request->getContent())->action;
            $login = new Login();
            $login->id = $bodyID;
            $login->action = $bodyAction;
            $login->time = (int)microtime(true) * 1000;
            $data = $this->tableLogin->saveLogin($login);
        } else {
            $data = ["bad request!", http_response_code(400)];
        }
        return new ViewModel($data);
    }
}
