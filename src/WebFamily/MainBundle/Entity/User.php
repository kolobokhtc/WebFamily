<?php

namespace WebFamily\MainBundle\Entity;

use CoreDomain\User as CoreUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User extends CoreUser {

    public function __construct() {
	parent::__construct();
	
	$this->balances = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="WebFamily\MoneyBundle\Entity\Balance", mappedBy="User") 
     */
    private $Balances;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
	return $this->id;
    }


    /**
     * Add Balances
     *
     * @param \WebFamily\MoneyBundle\Entity\Balance $balances
     * @return User
     */
    public function addBalance(\WebFamily\MoneyBundle\Entity\Balance $balances)
    {
        $this->Balances[] = $balances;

        return $this;
    }

    /**
     * Remove Balances
     *
     * @param \WebFamily\MoneyBundle\Entity\Balance $balances
     */
    public function removeBalance(\WebFamily\MoneyBundle\Entity\Balance $balances)
    {
        $this->Balances->removeElement($balances);
    }

    /**
     * Get Balances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBalances()
    {
        return $this->Balances;
    }
}
