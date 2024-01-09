<?php

namespace App\Room;

class RoomFactory
{
    private $code;
    private $name;
    private $skip;
    private $votes;

    function __construct(){
        $this->code = $this->generateCode();
    }

    private function generateCode(): string{
        $this->code = "";
        $this->code = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil(6/strlen($x)) )),1,6);
        return $this->code;
    }

    public function getCode(){
        return $this->code;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $skip
     */
    public function setSkip($skip): void
    {
        $this->skip = $skip;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes): void
    {
        $this->votes = $votes;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSkip()
    {
        return $this->skip;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }
}