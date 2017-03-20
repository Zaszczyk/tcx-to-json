<?php
namespace MateuszBlaszczyk\TcxToJson;

class Trackpoint implements \Serializable
{
    public $latitude;

    public $longitude;

    public $altitude;

    public $timestamp;

    public $distance;

    public function isComplete()
    {
        if ($this->latitude && $this->longitude && $this->altitude && isset($this->distance)) {
            return true;
        }

        return false;
    }

    public function isCompleteWithoutDistance($isDistance, $results = [])
    {
        if ($this->latitude && $this->longitude && $this->altitude && $isDistance === false) {
            if(count($results) == 0) {
                $this->distance = 0;
            } else {
                $distanceCalculator = new DistanceCalculator();
                $lastTrackpoint = $this->unserialize(end($results));
                $this->distance = $distanceCalculator->countDistanceBetween2Trackpoints($this, $lastTrackpoint);
            }
            return true;
        }

        return false;
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