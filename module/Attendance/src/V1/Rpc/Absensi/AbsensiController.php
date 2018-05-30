<?php

namespace Attendance\V1\Rpc\Absensi;

use Attendance;
use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class AbsensiController extends AbstractActionController
{
    /**
     * AbsensiController constructor.
     */
    private $tableAttendance;
    private $tableLogin;
    public $paramLocation;
    public $paramMeeting;


    /*public function __construct($tableAttendance)
    {
        $this->tableAttendance = $tableAttendance;
    }*/
    public function __construct($tableAttendance)
    {
        $this->tableAttendance = $tableAttendance;
    }

    public function absensiAction()
    {
        $request = $this->getRequest();
        $paramMeeting = $this->params()->fromQuery('meeting', null);
        $paramLocation = $this->params()->fromQuery('location', null);
        if ($request->isPost()) {
            $bodyID = Json::decode($request->getContent())->ID;
            $attendanceModel = new \Application\Model\Attendance();
            $attendanceModel->id = $bodyID;
            $attendanceModel->meeting = $paramMeeting;
            $attendanceModel->location = $paramLocation;
            $attendanceModel->time = (int)microtime(true) * 1000;
            $data = $this->tableAttendance->saveAttendance($attendanceModel);
            $res = $data;
        }

        if ($request->isGet()) {
            $data = $this->tableAttendance->fetchAll();
            foreach ($data as $item) {
                $res = array(
                    "id" => $item->id,
                    "meeting" => $item->meeting,
                    "location" => $item->location,
                    "time" => $item->time
                );
            }
        }
        return new ViewModel($res);
    }


}
