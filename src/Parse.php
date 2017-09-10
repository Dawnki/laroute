<?php
/**
 * Created by PhpStorm.
 * User: dawnki
 * Date: 17-9-10
 * Time: 下午3:14
 */

namespace dawnki\laroute;


class Parse
{
    protected $namespace;

    protected $statements = [];

    protected $export;

    public function __construct($namespace)
    {
        $this->export = new Export($namespace);
    }

    public function bootstrap($className)
    {
        $reflection = new \ReflectionClass($className);
        $className = $reflection->getName();
        $methods = $reflection->getMethods();
        foreach ($methods as $method) {
            $phpDoc = $method->getDocComment();
            $methodName = $method->getName();
            $httpMethod = $this->getHttpMethod($phpDoc);
            $route = $this->getRoute($phpDoc);
            if (!$httpMethod || !$route) break;
            $this->statements[] = $this->export->get($httpMethod, $route, $className, $methodName);
        }
        return $this;
    }

    /**
     *  获取路由语句
     * @return array
     */
    public function getStatements()
    {
        return $this->statements;
    }

    protected function getHttpMethod($string)
    {
        return preg_match('/@method .*/i', $string, $matches) ?
            trim(substr($matches[0], strlen('@method '))) :
            false;
    }

    protected function getRoute($string)
    {
        return preg_match('/@route .*/i', $string, $matches) ?
            trim(substr($matches[0], strlen('@route '))) :
            false;
    }
}