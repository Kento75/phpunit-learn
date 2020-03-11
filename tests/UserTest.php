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
        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('hoge@example.com'), $this->equalTo('HEllo'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);
        $user->email = 'hoge@example.com';

        $this->assertTrue($user->notify('HEllo'));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User('hoge', 'fuga');
        $mock_mailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);

        $user->notify('Hello');
    }
}
