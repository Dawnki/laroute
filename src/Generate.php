<?php
/**
 * Created by PhpStorm.
 * User: dawnki
 * Date: 17-9-10
 * Time: 下午12:58
 */

namespace dawnki\laroute;

class Generate
{
    protected $namespace;

    protected $parser;

    protected $result = [];

    public function __construct($namespace = 'App\Http\Controllers\\')
    {
        $this->parser = new Parse($namespace);
    }

    public function getOne($className)
    {
        $this->result = $this->parser->bootstrap($className)->getStatements();
        return $this;
    }

    public function getAll()
    {

    }

    public function toArray()
    {
        return $this->result;
    }

    public function toJson()
    {
        return json_encode($this->result);
    }

    public function display()
    {
        if ($this->result) {
            foreach ($this->result as $item) {
                echo $item . "\n";
            }
        }
    }

    public function setControllerNameSpace()
    {

    }
}