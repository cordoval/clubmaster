<?php

namespace Club\ShopBundle\Entity;

/**
 * @orm:Entity(repositoryClass="Club\ShopBundle\Repository\Attribute")
 * @orm:Table(name="club_shop_attribute")
 *
 */
class Attribute
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    private $id;

    /**
     * @orm:Column(type="string")
     *
     * @var string $attribute_name
     */
    private $attribute_name;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set shipping_name
     *
     * @param string $shippingName
     */
    public function setShippingName($shippingName)
    {
        $this->shipping_name = $shippingName;
    }

    /**
     * Get shipping_name
     *
     * @return string $shippingName
     */
    public function getShippingName()
    {
        return $this->shipping_name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function setAttributeName($attribute_name)
    {
        $this->attribute_name = $attribute_name;
    }

    public function getAttributeName()
    {
        return $this->attribute_name;
    }
}