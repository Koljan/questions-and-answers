<?php


class Session
{
    public $id;

    function __construct()
    {
        $this->getSession();
    }

    private function getSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->id = session_id();
    }

    public function destroySession()
    {
        session_destroy();
        $_SESSION = [];
    }
}
