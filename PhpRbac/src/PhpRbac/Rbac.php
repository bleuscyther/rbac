<?php
namespace PhpRbac;

use \jf;

/**
 * @file
 * Provides NIST Level 2 Standard Role Based Access Control functionality
 *
 * @defgroup phprbac RBAC Functionality
 * @{
 * Documentation for all PhpRbac related functionality.
 */
class Rbac
{
    public function __construct($unit_test = '')
    {
        if ((string) $unit_test === 'unit_test') {
            require_once dirname(dirname(__DIR__)) . '/tests/database/database.config';
        } else {
            require_once dirname(dirname(__DIR__)) . '/database/database.config';
        }

        require_once 'core/lib/jf.php';
        jf::setTablePrefix($table_prefix);
        
        $this->Permissions = jf::$RBAC->Permissions;
        $this->Roles = jf::$RBAC->Roles;
        $this->Users = jf::$RBAC->Users;
    }
    
    public function assign($role, $permission)
    {
        return jf::$RBAC->Assign($role, $permission);
    }

    public function check($permission, $user_id)
    {
        return jf::$RBAC->Check($permission, $user_id);
    }
    
    public function enforce($permission)
    {
        return jf::$RBAC->Enforce($permission);
    }
    
    public function reset($ensure = false)
    {
        return jf::$RBAC->Reset($ensure);
    }
    
    public function tablePrefix()
    {
        return jf::$RBAC->TablePrefix();
    }
}

/** @} */ // End group phprbac */