<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 18.10.2016
 * Time: 13:46
 */

namespace MSBios\Model\Repository\Service;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use MSBios\Model\Repository\IdentityMap\MemoryIdentityMap;
use MSBios\Model\Repository\Mapper\MySQLDataMapper;
use MSBios\Model\Repository\UserRepository;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class UserRepositoryFactory
 * @package MSBios\Model\Repository\Service
 */
class UserRepositoryFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new UserRepository(
            $container->get(MemoryIdentityMap::class),
            $container->get(MySQLDataMapper::class)
        );
    }
}