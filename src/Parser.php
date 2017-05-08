<?php

namespace MateuszBlaszczyk\TcxToJson;

use XMLReader;

class Parser
{
    protected $xml;

    protected $vt;

    protected $results = [];

    public function __construct($xml)
    {
        $this->xml = $xml;
        $this->vt = new ValueTransformer();
    }

    public function parse($obligatoryAltitude = true)
    {
        $this->results = [];

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
                        if ($trackpoint->latitude !== null && $trackpoint->isCompleteWithoutDistance($obligatoryAltitude)) {
                            $trackpoint->calculateDistance($this->results);
                            $trackpoint = $this->storeTrackpointAndGetNew($trackpoint);
                        }
                        $trackpoint->latitude = $this->vt->substrGPSCoordinate($node->nodeValue);
                        break;
                    case 'LongitudeDegrees':
                        $node = $xmlReader->expand();
                        if ($trackpoint->longitude !== null && $trackpoint->isCompleteWithoutDistance($obligatoryAltitude)) {
                            $trackpoint->calculateDistance($this->results);
                            $trackpoint = $this->storeTrackpointAndGetNew($trackpoint);
                        }
                        $trackpoint->longitude = $this->vt->substrGPSCoordinate($node->nodeValue);
                        break;
                    case 'AltitudeMeters':
                        $node = $xmlReader->expand();
                        if ($trackpoint->altitude !== null && $trackpoint->isCompleteWithoutDistance($obligatoryAltitude)) {
                            $trackpoint->calculateDistance($this->results);
                            $trackpoint = $this->storeTrackpointAndGetNew($trackpoint);
                        }
                        $trackpoint->altitude = $this->vt->roundAltitude($node->nodeValue);
                        break;
                    case 'DistanceMeters':
                        $node = $xmlReader->expand();
                        if ($xmlReader->depth > 4) {
                            $trackpoint->distance = $this->vt->roundDistance($node->nodeValue);
                        }
                        break;
                    case 'Time':
                        $node = $xmlReader->expand();
                        if ($trackpoint->timestamp !== null && $trackpoint->isCompleteWithoutDistance($obligatoryAltitude)) {
                            $trackpoint->calculateDistance($this->results);
                            $trackpoint = $this->storeTrackpointAndGetNew($trackpoint);
                        }
                        $trackpoint->timestamp = $this->vt->transformTime($node->nodeValue) - $timestamp;
                        break;
                }
                if ($trackpoint->isComplete($obligatoryAltitude)) {
                    $trackpoint = $this->storeTrackpointAndGetNew($trackpoint);
                }
            }
        }

        if ($trackpoint->isCompleteWithoutDistance($obligatoryAltitude)) {
            $trackpoint->calculateDistance($this->results);
            $trackpoint = $this->storeTrackpointAndGetNew($trackpoint);
        }

        return $this->results;
    }

    private function storeTrackpointAndGetNew(Trackpoint $trackpoint)
    {
        $this->results[] = $trackpoint->serialize();
        unset($trackpoint);
        return new Trackpoint();
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

        $timestamp = $this->vt->transformTime($timeString);
        return $timestamp;
    }
}