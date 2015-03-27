<?php

class Room
{
    private $room_reference = "";
    private $capacity;

    /**
     * @return string
     */
    public function getRoomReference()
    {
        return $this->room_reference;
    }

    /**
     * @param string $room_reference
     */
    public function setRoomReference($room_reference)
    {
        $this->room_reference = $room_reference;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }
}
