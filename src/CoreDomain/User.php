<?php

namespace CoreDomain;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser{
    
    protected $id;
    
    public function __construct() {
	parent::__construct();
    }
  
}
