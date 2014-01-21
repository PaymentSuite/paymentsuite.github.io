<?php

namespace Mmoreram\PaymentBridgeBundle\EventListener;

use PaymentSuite\PaymentCoreBundle\Event\PaymentOrderSuccessEvent;
use PaymentSuite\PaymentCoreBundle\Event\PaymentOrderFailEvent;
use Mmoreram\FrontBundle\Entity\Order;
use Doctrine\ORM\EntityManager;
use Swift_Mailer;
use Swift_Message;

/**
 * Payment event listener
 *
 * This listener is enabled whatever the payment method is.
 */
class Payment
{

    /**
     * @var EntityManager
     * 
     * Entity manager
     */
    private $entityManager;


    /**
     * @var Swift_Mailer
     *
     * Swift mailer
     */
    private $mailer;


    /**
     * Construct method
     *
     * @param OrderManager $orderManager Order manager
     * @param Swift_Mailer $mailer       Mailer
     */
    public function __construct(EntityManager $entityManager, Swift_Mailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }


    /**
     * On payment success event
     *
     * @param PaymentOrderSuccessEvent $paymentOrderSuccessEvent Payment Order Success event
     */
    public function onPaymentSuccess(PaymentOrderSuccessEvent $paymentOrderSuccessEvent)
    {

        $price = $paymentOrderSuccessEvent->getPaymentBridge()->getAmount();

        /**
         * We should just create an order associated to current Cart
         */
        $order = new Order;
        $order->setPrice($price);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $paymentOrderSuccessEvent->getPaymentBridge()->setOrder($order);        
    }


    /**
     * On payment success event
     *
     * @param PaymentOrderFailEvent $paymentOrderFailEvent Payment Order Fail event
     */
    public function onPaymentFail(PaymentOrderFailEvent $paymentOrderFailEvent)
    {
        
    }
}
