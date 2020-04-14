<?php declare(strict_types=1);


namespace App\Aspect;


use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Point\ProceedingJoinPoint;
use App\Http\Controller\HiController;

/**
 * Class MethodAspect
 * @Aspect(order=1)
 * @PointBean(include={HiController::class})
 * @PointExecution(
 *     include={"HelloController::index","HelloController::hhh"}
 * )
 * @package App\Aspect
 */
class MethodAspect
{
    /**
     * @Before()
     */
    public function before()
    {
        echo "before方法调用\n";
    }

    /**
     * @After()
     * @param JoinPoint $joinPoint
     * @param $id
     */
    public function after(JoinPoint $joinPoint, $id)
    {
        var_dump($joinPoint->getTarget());
        var_dump($joinPoint->getArgs());
        var_dump($joinPoint->getMethod());
        var_dump($joinPoint->getClassName());
        echo "after方法调用\n";
    }

    /**
     * @Around()
     * @param ProceedingJoinPoint $joinPoint
     * @return mixed
     * @throws \Throwable
     */
    public function around(ProceedingJoinPoint $joinPoint)
    {
        echo "around 前置方法调用\n";
        $result = $joinPoint->proceed();
        echo "around 后置方法调用\n";
        return $result;
    }

    /**
     * @AfterReturning()
     * @param JoinPoint $joinPoint
     * @param $id
     * @return mixed
     */
    public function afterReturning(JoinPoint $joinPoint, $id)
    {
        echo "afterReturning 方法调用开始\n";
        $res = $joinPoint->getReturn();
        echo "afterReturning 方法调用结束\n";
        return $res;
    }

    /**
     * @AfterThrowing()
     * @param $id
     */
    public function afterThrowing($id)
    {
        echo "捕获到异常调用\n";
    }
}
