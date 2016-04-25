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
        $results = [];

        /**
         * {"altitude":112.5,"latitude":52.231231,"type":"start","timestamp":0,"longitude":21.011354}
         */

        $xmlReader = new XMLReader;
        $xmlReader->xml($this->xml);
        $timestamp = $this->getStartTimestamp($xmlReader);

        $item = [];
        while ($xmlReader->read()) {
            if ($xmlReader->nodeType == XMLReader::ELEMENT) {
                switch ($xmlReader->name) {
                    case 'LatitudeDegrees':
                        $node = $xmlReader->expand();
                        $item['latitude'] = $node->nodeValue;
                        break;
                    case 'LongitudeDegrees':
                        $node = $xmlReader->expand();
                        $item['longitude'] = $node->nodeValue;
                        break;
                    case 'AltitudeMeters':
                        $node = $xmlReader->expand();
                        $item['altitude'] = $node->nodeValue;
                        break;
                    case 'Time':
                        $node = $xmlReader->expand();
                        $item['timestamp'] = strtotime($node->nodeValue) - $timestamp;
                        break;
                }
            }

            if (isset($item['latitude']) && isset($item['longitude']) && isset($item['altitude'])) {
                $results[] = $item;
                $item = [];
            }
        }

        return $results;
    }

    public function getStartTimestamp(XMLReader $xmlReader)
    {
        $timeString = false;
        while ($xmlReader->read()) {
            if ($xmlReader->nodeType == XMLReader::ELEMENT && $xmlReader->name == 'Lap') {
                $timeString = $xmlReader->getAttribute('StartTime');
                break;
            }
        }

        if (!$timeString) {
            return false;
        }

        $timestamp = strtotime($timeString);
        return $timestamp;
    }

}