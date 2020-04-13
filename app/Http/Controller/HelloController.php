<?php declare(strict_types=1);


namespace App\Http\Controller;


use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

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
}
