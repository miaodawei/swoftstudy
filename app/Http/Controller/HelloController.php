<?php declare(strict_types=1);


namespace App\Http\Controller;


use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * @Controller(prefix="hello")
 * Class HelloController
 * @package App\Http\Controller
 */
class HelloController
{
    /**
     * @RequestMapping(route="index")
     * @return string
     */
    public function index()
    {
        return 'hello running';
    }

    /**
     * @RequestMapping(route="hhh")
     * @return int
     */
    public function hhh() : int
    {
        return 2;
    }

    /**
     * @RequestMapping(
     *     route="event-test",
     *     method={RequestMethod::POST}
     * )
     */
    public function eventTest()
    {
//        \Swoft::trigger('hello.event1', 'hellotarget', ['name'=>'hello'], "参数2");
        \Swoft::triggerByArray('hello.event1', 'hellotarget', [
            'arg0' => ['name' => 'hello'],
            'arg1' => 'canshu2'
        ]);
    }

    /**
     * @RequestMapping(route="event-test2")
     */
    public function eventTest2()
    {
        \Swoft::triggerByArray('hello.event2', 'hellotarget2', [
            'arg1' => 'asdfsafsdf'
        ]);
    }
}
