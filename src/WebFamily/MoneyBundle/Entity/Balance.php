<?php

namespace WebFamily\MoneyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Balance")
 * @ORM\HasLifecycleCallbacks()
 */
class Balance {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="\WebFamily\MainBundle\Entity\User", inversedBy="Balances")
     * @ORM\JoinColumn(name="UserID", referencedColumnName="id")
     */
    private $User;

    /**
     * @ORM\Column(type="integer");
     */
    protected $Amount;

    /**
     * @ORM\Column(type="integer");
     */
    protected $Type;

    /**
     * @ORM\Column(type="datetime");
     */
    protected $CreateDate;

    /**
     * @ORM\ManyToOne(targetEntity="\WebFamily\MainBundle\Entity\User")
     * @ORM\JoinColumn(name="CreatedBy", referencedColumnName="id")
     */
    protected $CreatedBy;

    /**
     * @ORM\Column(type="string", length=15);
     */
    protected $CreaterIP;

    /**
     * @ORM\Column(type="datetime");
     */
    protected $UpdateDate;

    /**
     * @ORM\ManyToOne(targetEntity="\WebFamily\MainBundle\Entity\User")
     * @ORM\JoinColumn(name="UpdatedBy", referencedColumnName="id")
     */
    protected $UpdatedBy;

    /**
     * @ORM\Column(type="string", length=15, nullable=true);
     */
    protected $UpdaterIP;

    /**
     * @ORM\PrePersist
     */
    public function prePersist() {
	$this->CreateDate = new \DateTime();
	$this->UpdateDate = new \DateTime();
	$this->CreaterIP = $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
	$this->UpdateDate = new \DateTime();
	$this->UpdaterIP = $_SERVER['REMOTE_ADDR'];
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Amount
     *
     * @param integer $amount
     * @return Balance
     */
    public function setAmount($amount)
    {
        $this->Amount = $amount;

        return $this;
    }

    /**
     * Get Amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * Set Type
     *
     * @param integer $type
     * @return Balance
     */
    public function setType($type)
    {
        $this->Type = $type;

        return $this;
    }

    /**
     * Get Type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set CreateDate
     *
     * @param \DateTime $createDate
     * @return Balance
     */
    public function setCreateDate($createDate)
    {
        $this->CreateDate = $createDate;

        return $this;
    }

    /**
     * Get CreateDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->CreateDate;
    }

    /**
     * Set CreaterIP
     *
     * @param string $createrIP
     * @return Balance
     */
    public function setCreaterIP($createrIP)
    {
        $this->CreaterIP = $createrIP;

        return $this;
    }

    /**
     * Get CreaterIP
     *
     * @return string 
     */
    public function getCreaterIP()
    {
        return $this->CreaterIP;
    }

    /**
     * Set UpdateDate
     *
     * @param \DateTime $updateDate
     * @return Balance
     */
    public function setUpdateDate($updateDate)
    {
        $this->UpdateDate = $updateDate;

        return $this;
    }

    /**
     * Get UpdateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->UpdateDate;
    }

    /**
     * Set UpdaterIP
     *
     * @param string $updaterIP
     * @return Balance
     */
    public function setUpdaterIP($updaterIP)
    {
        $this->UpdaterIP = $updaterIP;

        return $this;
    }

    /**
     * Get UpdaterIP
     *
     * @return string 
     */
    public function getUpdaterIP()
    {
        return $this->UpdaterIP;
    }

    /**
     * Set User
     *
     * @param \WebFamily\MainBundle\Entity\User $user
     * @return Balance
     */
    public function setUser(\WebFamily\MainBundle\Entity\User $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return \WebFamily\MainBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Set CreatedBy
     *
     * @param \WebFamily\MainBundle\Entity\User $createdBy
     * @return Balance
     */
    public function setCreatedBy(\WebFamily\MainBundle\Entity\User $createdBy = null)
    {
        $this->CreatedBy = $createdBy;

        return $this;
    }

    /**
     * Get CreatedBy
     *
     * @return \WebFamily\MainBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->CreatedBy;
    }

    /**
     * Set UpdatedBy
     *
     * @param \WebFamily\MainBundle\Entity\User $updatedBy
     * @return Balance
     */
    public function setUpdatedBy(\WebFamily\MainBundle\Entity\User $updatedBy = null)
    {
        $this->UpdatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get UpdatedBy
     *
     * @return \WebFamily\MainBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->UpdatedBy;
    }
}
