<?php
namespace Application\Controller;

use MSBios\Model\Repository\UserRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{
    /** @var  UserRepository */
    protected $userRepository;

    /**
     * IndexController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $this->userRepository->find(1);
        return new ViewModel([]);
    }
}
