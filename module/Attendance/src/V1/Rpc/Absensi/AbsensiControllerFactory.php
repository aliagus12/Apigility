<?php
namespace Attendance\V1\Rpc\Absensi;

use Application\Model\AttendanceTable;
use Zend\ServiceManager\Factory\FactoryInterface;

class AbsensiControllerFactory implements FactoryInterface
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.

        $tableAttendance = $container->get(AttendanceTable::class);
        return new AbsensiController($tableAttendance);
    }
}
