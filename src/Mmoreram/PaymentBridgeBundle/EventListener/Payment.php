<?php

namespace Mmoreram\PaymentBridgeBundle\EventListener;

use Mmoreram\PaymentCoreBundle\Event\PaymentSuccessEvent;
use Mmoreram\PaymentCoreBundle\Event\PaymentFailEvent;
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
     * @param PaymentSuccessEvent $paymentSuccessEvent Payment Success event
     */
    public function onPaymentSuccess(PaymentSuccessEvent $paymentSuccessEvent)
    {
        
    }


    /**
     * On payment success event
     *
     * @param PaymentSuccessEvent $paymentSuccessEvent Payment Success event
     */
    public function onPaymentFail(PaymentFailEvent $paymentFailEvent)
    {
        
    }
}