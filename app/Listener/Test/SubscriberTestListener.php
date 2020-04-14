<?php


namespace App\Listener\Test;


use Swoft\Event\Annotation\Mapping\Subscriber;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Event\EventSubscriberInterface;
use Swoft\Event\Listener\ListenerPriority;

/**
 * Class SubscriberTestListener
 * @package App\Listener\Test
 * @Subscriber()
 */
class SubscriberTestListener implements EventSubscriberInterface
{
    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event): void
    {
        $params = $event->getParams();
        var_dump($params);
        echo "事件处理具体的函数evnet2\n";
    }

    public static function getSubscribedEvents() : array
    {
        return [
            "hello.event2"=>['handle'],
            "hello.event3"=>['workerStart',ListenerPriority::LOW] //第一个参数方法名,第二个参数优先级
        ];
    }

    public function workerStart(EventInterface $event)
    {
        echo "事件处理的具体函数wike.evnet3,\n";
    }
}
