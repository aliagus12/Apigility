<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 26/05/18
 * Time: 11.14
 */

namespace Application\Model;


use Zend\Db\TableGateway\TableGatewayInterface;

class AttendanceTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getAttendance($id)
    {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(['id' => $id,]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                'Cannot find row with identifier %d',
                $id
            ));
        }
        return $row;
    }

    public function saveAttendance(Attendance $attendance)
    {
        $data = [
            'id' => $attendance->id,
            'meeting' => $attendance->meeting,
            'location' => $attendance->location,
            'time' => $attendance->time,
        ];
        $isSuccess = $this->tableGateway->insert($data) ? true : false;
        $data['success'] = $isSuccess;
        return $data;
    }

    public function deleteAttendance($id)
    {
        $this->tableGateway->delete(['id' => (int)$id]);
    }
}