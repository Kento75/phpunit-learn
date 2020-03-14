<?php


class UserMailer
{

    public $email;

    protected $mailer;

    protected $mailer_callable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param mixed $mailer_callable
     */
    public function setMailerCallable($mailer_callable): void
    {
        $this->mailer_callable = $mailer_callable;
    }

    public function notify(string $message)
    {
        return $this->mailer->send($this->email, $message);
    }

    // callback pattern
    public function callBackNotify(string $message)
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }

    // static method pattern
    public function staticNotify(string $message)
    {
        return Mailer::send($this->email, $message);
    }
}
