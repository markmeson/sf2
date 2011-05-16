<?php 

namespace Acme\StudyBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;




/**
 * @orm:Entity
 * @orm:Table(name="fos_user")
 */

class User extends BaseUser
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:generatedValue(strategy="AUTO")
     */
  protected $id;

  public function __construct()
  {
    parent::__construct();
    
  }

}
