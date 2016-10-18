<?php

/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Model;

use MSBios\Model\Repository\IdentityMap\MemoryIdentityMap;
use MSBios\Model\Repository\Mapper\MySQLDataMapper;
use MSBios\Model\Repository\Service\UserRepositoryFactory;
use MSBios\Model\Repository\UserRepository;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Router\Http\RouteMatch;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * Class Module
 * @package MSBios\Model
 */
class Module implements ServiceProviderInterface
{
    /** const */
    const VERSION = '3.0.2dev';

    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getEventManager()->attach(
            MvcEvent::EVENT_DISPATCH,
            function (MvcEvent $e) {
                /** @var RouteMatch $routeMatch */
                $routeMatch = $e->getRouteMatch();
            },
            100
        );
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                MemoryIdentityMap::class => InvokableFactory::class,
                MySQLDataMapper::class => InvokableFactory::class,
                UserRepository::class => UserRepositoryFactory::class,
            ],
        ];
    }
}
