<?php

namespace bundles\user\Entities\Mapping;

/**
 * \app\Entity\UserGroup Entity
 *
 * @see \bundles\user\Entities\User
 * @author infradmin
 */
class UserGroup extends \Library\Core\Entity {

    const ENTITY = 'UserGroup';
    const TABLE_NAME = 'userGroups';
    const PRIMARY_KEY = 'idusergroup';

    /**
     * Object caching duration in seconds
     * @var integer
     */
    protected $iCacheDuration = 120;

    protected $aLinkedEntities;

}
