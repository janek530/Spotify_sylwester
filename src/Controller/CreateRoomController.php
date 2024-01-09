<?php

namespace App\Controller;

use App\Entity\Room;
use App\Room\RoomFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateRoomController extends AbstractController
{
    #[Route('/create/room', name: 'app_create_room')]
    public function index(): Response
    {
        $room = new RoomFactory();
        $roomCode = $room->getCode();
        $code = $roomCode;
        return $this->render('create_room/createRoom.html.twig', [
            'code' => $roomCode,
        ]);
    }

    #[Route('/create/room/api', name: 'app_create_room_api')]
    public function createRoom(EntityManagerInterface $entityManager): Response
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            $roomCode = $_POST['code'];
            if(!isset($_POST['skip'])){
                $skip = false;
                $votes = 0;
            }
            else {
                $skip = $_POST['skip'];
                $votes = $_POST['votes'];
            }
            if (isset($name) || isset($roomCode)) {
                $room = new Room();
                $room->setName($name);
                $room->setCode($roomCode);
                $room->setSkip($skip);
                $room->setVotes($votes);
                $entityManager->persist($room);
                $entityManager->flush();
                return $this->json("create room");
            }
        }
        else {
            return $this->json("error");
        }
    }
}
