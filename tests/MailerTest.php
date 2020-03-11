<?php


use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{

    public function testSendMessage()
    {
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('developer@example.com', 'Hello');

        $this->assertTrue($result);
    }
}
