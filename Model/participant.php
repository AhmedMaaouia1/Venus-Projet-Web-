<?php
class Participant{
    private ?int $idparticipation = null;
    private ?int $id_event = null;
    private ?int $id_user = null;


    public function __construct(int $id_event, int $id_user)
    {
        $this->id_event = $id_event;
        $this->id_user = $id_user;
    }

    public function getIdparticipation(): int
    {
        return $this->idparticipation;
    }

    public function setIdparticipation(int $idparticipation): void
    {
        $this->idparticipation = $idparticipation;
    }

    public function getIdevent(): int
    {
        return $this->id_event;
    }

    public function setIdevent(int $id_event): void
    {
        $this->id_event = $id_event;
    }

    public function getIduser(): int
    {
        return $this->id_user;
    }


    public function setIduser(int $id_user): void
    {
        $this->id_user = $id_user;
    }



}
?>