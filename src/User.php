<?php


class User
{
    private $first_name;

    private $surname;

    protected $mailer;

    public function __construct($first_name, $surname)
    {
        $this->surname = $surname;
        $this->first_name = $first_name;
    }

    public function getFullName()
    {
        return "{$this->first_name} {$this->surname}";
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}
