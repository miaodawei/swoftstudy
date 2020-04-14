<?php


namespace App\Listener\Test;


use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;

/**
 * Class TestListener
 * @package App\Listener\Test
 * @since 2.0
 * @Listener("hello.event1")
 */
class TestListener implements EventHandlerInterface
{

    /**
     * @inheritDoc
     */
    public function handle(EventInterface $event): void
    {
        $target = $event->getTarget();
        $name = $event->getName();
        $params = $event->getParams();
        $arg0 = $event->getParam('arg0', 'key1不存在');
        $param = $event->getParam('key1', 'key1不存在');
        $event->stopPropagation(true);

        var_dump($name);
        var_dump($params);
        var_dump($arg0);
        var_dump($param);
        echo "具体的事件操作代码\n";
    }
}
