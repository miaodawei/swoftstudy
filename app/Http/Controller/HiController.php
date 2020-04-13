<?php declare(strict_types=1);


namespace App\Http\Controller;


use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * @Controller()
 * Class HiController
 * @package App\Http\Controller
 */
class HiController
{
    /**
     * @RequestMapping(route="api/index/{num}")
     * @param int $num
     * @return array
     */
    public function index(int $num) : array
    {
        return [$num];
    }

    /**
     * @RequestMapping(route="api/ttt")
     * @return int
     */
    public function ttt() : int
    {
        return 1;
    }
}
