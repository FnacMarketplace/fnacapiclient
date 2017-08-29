<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * This class represent a customer address for shipping or billing.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Address extends Entity
{
    private $firstname;
    private $lastname;
    private $company;
    private $address1;
    private $address2;
    private $address3;
    private $zipcode;
    private $city;
    private $country;
    private $phone;
    private $mobile;

    /**
     * {@inheritDoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->company = $data['company'];
        $this->address1 = $data['address1'];
        $this->address2 = isset($data['address2']) ? $data['address2'] : "";
        $this->address3 = isset($data['address3']) ? $data['address3'] : "";
        $this->zipcode = $data['zipcode'];
        $this->city = $data['city'];
        $this->country = $data['country'];
        $this->phone = isset($data['phone']) ? $data['phone'] : "";
        $this->mobile = isset($data['mobile']) ? $data['mobile'] : "";
    }

    /**
     * Address firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Address lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Address company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Return first part of address
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Return second part of address
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Return third part of address
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Return the zipcode of city
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Return the city of client
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Return country of client
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Return the phone of client
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Return the mobile phone of client
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }
}
