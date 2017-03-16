<?php

namespace AppBundle\Subscriber;


use Cos\RestClientBundle\Event\Events;
use Cos\RestClientBundle\Event\RequestEvent;
use Cos\RestClientBundle\Event\ResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RestLoggerSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::REST_RESPONSE => 'onResponse',
            Events::REST_REQUEST => 'onRequest',
        ];
    }

    public function onResponse(ResponseEvent $event)
    {
        dump($event->getResponse());
    }

    public function onRequest(RequestEvent $event)
    {
        dump($event->getRequest());
    }
}