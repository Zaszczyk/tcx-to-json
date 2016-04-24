<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.04.2016
 * Time: 23:32
 */

namespace MateuszBlaszczyk\TcxToJson;


use XMLReader;

class Parser
{
    protected $xml;

    public function __construct($xml)
    {
        $this->xml = $xml;
    }

    public function parse()
    {
        $xmlReader = new XMLReader;
        $xmlReader->xml($this->xml);

        return true;
    }

}