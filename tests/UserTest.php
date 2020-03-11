<?php


use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testGetFullName()
    {

        $first_name = "first";
        $surname = "last";
        $user =  new User($first_name, $surname);

        $this->assertEquals($user->getFullName(), $first_name . ' ' . $surname);
    }

    public function testNotificationIsSent()
    {
        $user = new User('hoge', 'fuga');

        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->method('sendMessage')
            ->willReturn(true);

        $user->setMailer(new Mailer);
        $user->email = 'hoge@example.com';

        $this->assertTrue($user->notify('HEllo'));
    }
}
