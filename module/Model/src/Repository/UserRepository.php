<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Model\Repository;

/**
 * Class UserRepository
 * @package MSBios\Model\Repository
 */
class UserRepository
{
    /**
     * UserRepository constructor.
     * @param IdentityMapInterface $identityMap
     * @param DataMapperInterface $dataMapper
     */
    public function __construct(IdentityMapInterface $identityMap, DataMapperInterface $dataMapper)
    {
    }

    public function find($int)
    {
    }
}