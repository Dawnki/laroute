<?php
/**
 * Created by PhpStorm.
 * User: dawnki
 * Date: 17-9-10
 * Time: 下午3:20
 */

namespace dawnki\laroute;


class Export
{
    /**
     *  获取输出模板
     * @param $httpMethod string 请求方法
     * @param $route string  请求路由
     * @param $className string 控制器类名
     * @param $methodName string 控制器中的方法名
     * @return string
     */
    public function get($httpMethod, $route,$className, $methodName)
    {
        return sprintf("Route::%s('%s',['uses'=>'%s@%s']);",
            strtolower($httpMethod),
            $route,
            $this->clearDefaultNameSpace($className),
            $methodName
        );
    }

    private function clearDefaultNameSpace($namespace)
    {
        return strstr($namespace, DEFAULT_NAMESPACE) ?
            substr(strstr($namespace, DEFAULT_NAMESPACE), strlen(DEFAULT_NAMESPACE)) :
            $namespace;
    }
}