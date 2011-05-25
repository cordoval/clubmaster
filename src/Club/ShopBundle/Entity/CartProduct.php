<?php

namespace Club\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Club\ShopBundle\Repository\CartProduct")
 * @ORM\Table(name="club_shop_cart_product")
 */
class CartProduct
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string $product_name
     */
    private $product_name;

    /**
     * @ORM\Column(type="decimal")
     *
     * @var float $price
     */
    private $price;

    /**
     * @ORM\Column(type="decimal")
     *
     * @var float $tax
     */
    private $tax;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="Club\ShopBundle\Entity\Product")
     *
     * @var Club\UserBundle\Entity\Product
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Club\ShopBundle\Entity\Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id", onDelete="cascade")
     *
     * @var Club\UserBundle\Entity\Cart
     */
    private $cart;

    /**
     * @ORM\OneToMany(targetEntity="Club\ShopBundle\Entity\CartProductAttribute", mappedBy="cart_product", cascade={"persist"})
     */
    private $cart_product_attributes;


    public function __construct()
    {
        $this->cart_product_attributes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set product_name
     *
     * @param string $productName
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;
    }

    /**
     * Get product_name
     *
     * @return string $productName
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Set price
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get tax
     * *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set tax
     *
     * @param float $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * Get tax
     * *
     * @return float $tax
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return integer $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set cart
     *
     * @param string $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }

    /**
     * Get cart
     *
     * @return string $cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    public function setProduct($product)
    {
      $this->product = $product;
    }

    public function getProduct()
    {
      return $this->product;
    }

    public function addCartProductAttribute(\Club\ShopBundle\Entity\CartProductAttribute $cartProductAttribute)
    {
      $this->cart_product_attributes[] = $cartProductAttribute;
    }

    public function getCartProductAttributes()
    {
        return $this->cart_product_attributes;
    }
}
