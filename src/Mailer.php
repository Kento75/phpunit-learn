<?php


class Mailer
{

    /**
     * @param string $email
     * @param string $message
     * @return bool
     */
    public function sendMessage($email, $message)
    {
        sleep(3);
        echo "send '$email' . to '$message'";

        return true;
    }
}
