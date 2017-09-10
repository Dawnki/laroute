<?php
/**
 * Created by PhpStorm.
 * User: dawnki
 * Date: 17-9-10
 * Time: 下午12:58
 */

namespace dawnki\laroute;

define('DEFAULT_NAMESPACE', 'App\Http\Controllers\\');

class Generate
{
    protected $namespace;

    protected $parser;

    protected $result = [];

    public function __construct($namespace = DEFAULT_NAMESPACE)
    {
        $this->parser = new Parse();
    }

    public function getOne($className)
    {
        $this->result = $this->parser->bootstrap($className)->getStatements();
        return $this;
    }

    public function getAll()
    {

    }

    public function display()
    {
        if ($this->result) {
            foreach ($this->result as $item) {
                echo $item."\n";
            }
        }
    }

    public function setControllerNameSpace()
    {

    }
}