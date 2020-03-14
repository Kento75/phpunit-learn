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

    // static関数のテスト
    // for static methods
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('kento@example.com', 'Hey!!'));
    }

    // static method の Exception テスト
    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::send('', '');
    }
}
