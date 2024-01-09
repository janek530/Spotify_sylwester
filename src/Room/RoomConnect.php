<?php

namespace App\Room;

use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class RoomConnect
{
    private $code;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    public function connect(string $code){

        $this->code = $this->upperCode($code);

        $room = $this->entityManager->getRepository(Room::class)->findBy(['code' => $this->code]);

        if(!$room) {
            throw new Exception("Room of code $code was not found");
        }

        return $room;
    }

    private function upperCode(string $code){
        return strtoupper($code);
    }
}