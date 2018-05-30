<?php

namespace Attendance\V1\Rpc\Login;

use Application\Model\LoginTable;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoginControllerFactory /*implements FactoryInterface*/
{
    /*public function __invoke($controllers)
    {
        return new LoginController();
    }*/
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.
        $tableLogin = $container->get(LoginTable::class);
        return new LoginController($tableLogin);
    }
}
