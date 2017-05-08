<?php
namespace MateuszBlaszczyk\TcxToJson;

class Trackpoint implements \Serializable
{
    public $latitude = null;

    public $longitude = null;

    public $altitude = null;

    public $timestamp = null;

    public $distance = null;

    public function isComplete($obligatoryAltitude = true)
    {
        if (($obligatoryAltitude && $this->altitude && $this->latitude && $this->longitude && isset($this->distance))
            ||
            ($obligatoryAltitude === false && $this->latitude && $this->longitude && isset($this->distance))) {
            return true;
        }

        return false;
    }

    public function isCompleteWithoutDistance($obligatoryAltitude = true)
    {
        if (($obligatoryAltitude && $this->latitude && $this->longitude && $this->altitude && $this->distance === null)
            ||
            ($obligatoryAltitude === false && $this->latitude && $this->longitude && $this->distance === null)) {
            return true;
        }

        return false;
    }

    public function calculateDistance($results)
    {
        if (count($results) == 0) {
            $this->distance = 0;
        } else {
            $distanceCalculator = new DistanceCalculator();
            $lastTrackpoint = $this->unserialize(end($results));
            $this->distance = $lastTrackpoint->distance + $distanceCalculator->countDistanceBetween2Trackpoints($this, $lastTrackpoint);
        }
    }

    public function serialize()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'distance' => $this->distance,
            'timestamp' => $this->timestamp,
        ];
    }

    public function unserialize($serialized)
    {
        $item = new Trackpoint();
        $item->latitude = $serialized['latitude'];
        $item->longitude = $serialized['longitude'];
        $item->altitude = $serialized['altitude'];
        $item->distance = $serialized['distance'];
        $item->timestamp = $serialized['timestamp'];

        return $item;
    }
}