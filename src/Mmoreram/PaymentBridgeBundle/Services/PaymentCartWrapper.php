<?php

namespace Mmoreram\PaymentBridgeBundle\Services;

use Mmoreram\PaymentCoreBundle\Services\Interfaces\CartWrapperInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;


/**
 * PaymentCartWrapper
 */
class PaymentCartWrapper implements CartWrapperInterface
{

    /**
     * @var Cart
     *
     * Cart
     */
    private $cart;


    /**
     * Construct method
     *
     * @param CartWrapper $cartWrapper Cart wrapper
     */
    public function __construct(Session $session, EntityManager $entityManager)
    {
        if ($session->get('cart_id')) {

            $this->cart = $entityManager
                ->getRepository('MmoreramFrontBundle:Cart')
                ->find($session->get('cart_id'));
        }
    }


    /**
     * Get cart amount
     *
     * @return float Amount
     */
    public function getAmount()
    {
        return $this->cart->getPrice();
    }


    /**
     * Get cart
     *
     * @return Object Cart object
     */
    public function getCart()
    {
        return $this->cart;
    }


    /**
     * Return cart id
     *
     * @return identifier
     */
    public function getCartId()
    {
        return $this->cart->getId();
    }


    /**
     * Return order identifier value
     *
     * @return integer
     */
    public function getCartDescription()
    {
        return 'Sandbox Payment - Cart ' . $this->getCartId() . ' - ' . date('d/m/Y - H:i:s');
    }
}