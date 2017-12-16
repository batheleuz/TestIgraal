<?php
/**
 * Created by PhpStorm.
 * User: Massamba
 * Date: 12/16/17
 * Time: 1:19 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="commission")
 */
class Commission
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *  @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     *  @ORM\Column(type="decimal" , precision= 10 , scale=2)
     */
    protected $cashback;

    /**
     * @ORM\ManyToOne(targetEntity="Marchant")
     * @ORM\JoinColumn(nullable=false)
     */
     private $marchant;

    /**
     * @ORM\ManyToOne(targetEntity="User" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCashback()
    {
        return $this->cashback;
    }

    /**
     * @param mixed $cashback
     */
    public function setCashback($cashback)
    {
        $this->cashback = $cashback;
    }

    /**
     * @return mixed
     */
    public function getMerchant()
    {
        return $this->marchant;
    }

    /**
     * @param mixed $marchant
     */
    public function setMerchant($marchant)
    {
        $this->marchant = $marchant;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}