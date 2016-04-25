<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.04.2016
 * Time: 14:45
 */

namespace MateuszBlaszczyk\TcxToJson;


class Trackpoint implements \Serializable
{
    public $latitude;

    public $longitude;

    public $altitude;

    public $timestamp;

    public function isComplete()
    {
        if ($this->latitude && $this->longitude && $this->altitude) {
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
            'timestamp' => $this->timestamp,
        ];
    }

    public function unserialize($serialized)
    {
        $item = new Trackpoint();
        $item->latitude = $serialized['latitude'];
        $item->longitude = $serialized['longitude'];
        $item->altitude = $serialized['altitude'];
        $item->timestamp = $serialized['timestamp'];

        return $item;
    }
}