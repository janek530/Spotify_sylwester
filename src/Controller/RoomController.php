<?php

namespace App\Controller;

use App\Room\RoomConnect;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    #[Route('/room')]
    public function showRoom(RoomConnect $roomConnect): Response{

        $code = "";

        for($i = 0; $i < 6; $i++){
            $code = $code.$_POST["inputCode$i"];
        }

        $room = $roomConnect->connect($code);

//        var_dump($room)


//        return $this->render("room/room.html.twig", [
//            'code'=>$room
//            'name'=>$room[0][0]['name'],
//            'skip'=>$room[0][0]['skip'],
//            'votes'=>$room[0][0]['votes'],
//            ]);
        return $this->json($room);
    }
}
