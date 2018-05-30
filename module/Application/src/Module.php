<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Application\Model\Attendance;
use Application\Model\AttendanceTable;
use Application\Model\Login;
use Application\Model\LoginTable;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                AttendanceTable::class => function ($container) {
                    $tableGateway = $container->get(AttendanceTableGateway::class);
                    return new AttendanceTable($tableGateway);
                },
                AttendanceTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Attendance());
                    return new TableGateway('attendance', $dbAdapter, null, $resultSetPrototype);
                },
                LoginTable::class => function ($container) {
                    $tableGateway = $container->get(LoginTableGateway::class);
                    return new LoginTable($tableGateway);
                },
                LoginTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Login());
                    return new TableGateway('login', $dbAdapter, null, $resultSetPrototype);
                }
            ],
        ];
    }


}
