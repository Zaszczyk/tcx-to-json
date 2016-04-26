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

    protected $gpsAccuracy = 6;

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

        $trackpoint = new Trackpoint();
        while ($xmlReader->read()) {
            if ($xmlReader->nodeType == XMLReader::ELEMENT) {
                switch ($xmlReader->name) {
                    case 'LatitudeDegrees':
                        $node = $xmlReader->expand();
                        $trackpoint->latitude = $this->substrGPSCoordinate($node->nodeValue);
                        break;
                    case 'LongitudeDegrees':
                        $node = $xmlReader->expand();
                        $trackpoint->longitude = $this->substrGPSCoordinate($node->nodeValue);
                        break;
                    case 'AltitudeMeters':
                        $node = $xmlReader->expand();
                        $trackpoint->altitude = $this->substrGPSCoordinate($node->nodeValue);;
                        break;
                    case 'Time':
                        $node = $xmlReader->expand();
                        $trackpoint->timestamp = strtotime($node->nodeValue) - $timestamp;
                        break;
                }
            }

            if ($trackpoint->isComplete()) {
                $results[] = $trackpoint->serialize();
                unset($trackpoint);
                $trackpoint = new Trackpoint();
            }
        }

        return $results;
    }

    public function getJson()
    {
        $results = $this->parse();
        return json_encode($results);
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

    public function substrGPSCoordinate($value)
    {
        $dotPos = strpos($value, '.');

        if (!$dotPos) {
            return $value;
        }

        return substr($value, 0, $dotPos + $this->gpsAccuracy + 1);
    }

}