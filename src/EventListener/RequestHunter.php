<?php


namespace App\EventListener;


use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;


class RequestHunter implements EventSubscriberInterface
{
    private $logger ;

    public function __construct(LoggerInterface $logger)
    {
           $this->logger= $logger ;
    }

    public static function getSubscribedEvents()
    {
       return [
           Request::class => 'onKernelRequest'
       ];
    }

    public function onKernelRequest(RequestEvent $event){
//        if($event->getRequest()->getRequestUri() == "/login")
           // dd($event->getRequest());
    }
}