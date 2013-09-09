<?php

namespace Mmoreram\PaymentBridgeBundle\Services;

use Doctrine\ORM\EntityManager;

class PaymentOrderWrapper implements OrderWrapperInterface
{

    /**
     * @var Order
     *
     * Order object
     */
    private $order;


    /**
     * @var EntityManager
     * 
     * Entity manager
     */
    private $entityManager;


    /**
     * Construct method
     *
     * @param EntityManager $entityManager Entity Manaer
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * Set order to OrderWrapper
     *
     * @var Object $order Order element
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }


    /**
     * Return order
     *
     * @return Object order
     */
    public function getOrder()
    {
        return $this->order;
    }


    /**
     * Return order identifier value
     *
     * @return integer
     */
    public function getOrderDescription()
    {
        return '';
    }


    /**
     * Return order identifier value
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order->getId();
    }


    /**
     * Given an id, find Order
     * 
     * @return Object order
     */
    public function findOrder($orderId)
    {
        $this->order = $this
            ->entityManager
            ->getRepository('MmoreramFrontBundle:Order')
            ->find($orderId);

        return $this->order;
    }
}