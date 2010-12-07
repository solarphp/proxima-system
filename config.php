<?php
/**
 * This is the suggested config file, to be placed in `$system/config.php`.
 */
$config = array();
$system = dirname(__FILE__);
$config['Solar']['system'] = $system;

/**
 * default configs for each vendor
 */
include "$system/source/solar/config/default.php";
include "$system/source/proxima/config/default.php";

/**
 * project overrides
 */

// database
$config['Solar_Sql'] = array(
    'adapter' => 'Solar_Sql_Adapter_Sqlite',
    'name'    => "$system/sqlite/proxima.sq3",
);

// front controller
$config['Solar_Controller_Front'] = array(
    'classes' => array(
        'Proxima_App',
        'Solar_App',
    ),
    'disable'  => array(),
    'default' => 'bookmarks',
    'explain' => true,
    'rewrite' => array(),
    'routing' => array(),
);

// model catalog
$config['Solar_Sql_Model_Catalog']['classes'] = array(
    'Proxima_Model',
);

// authentication
$config['Solar_Auth'] = array(
    'storage' => array(
        'adapter'       => 'Solar_Auth_Storage_Adapter_Sql',
        'table'         => 'members',
        'handle_col'    => 'handle',
        'passwd_col'    => 'passwd',
        'email_col'     => 'email',
        'uri_col'       => 'uri',
        'uid_col'       => 'id',
    ),
);

// access control
$config['Solar_Access'] = array(
    'adapter'      => 'Solar_Access_Adapter_File',
    'file'         => "$system/source/proxima/config/access.txt",
    'owner_method' => array(
        'Proxima_Model_Nodes_Record'   => 'accessIsOwner',
        'Proxima_Model_Members_Record' => 'accessIsOwner',
    ),
);

/**
 * done!
 */
return $config;
