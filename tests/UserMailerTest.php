<?php


use PHPUnit\Framework\TestCase;

class UserMailerTest extends TestCase
{

    public function testNotify()
    {
        $user = new UserMailer('testhoge@test.com');

        // モックインジェクション
        // send関数をが一回呼ばれること、trueが必ず返ってくる
        $mailer = $this->createMock(Mailer::class);
        $mailer->expects($this->once())
            ->method('send')
            ->willReturn(true);
        $user->setMailer($mailer);

        $this->assertTrue($user->notify("Heyyy!"));
    }

    // 関数ないでcallbackしてる関数のテストの場合
    public function testCallBackNotify()
    {
        $user = new UserMailer('hogefuga@example.com');

        // callback先の関数をインジェクション
        $user->setMailerCallable(function () {
            echo "mocked";
            return true;
        });

        $this->assertTrue($user->callBackNotify('Hello!!'));
    }

    // static関数にMockeryを使う場合
    function testStaticNotify()
    {
        $user = new UserMailer('test@hoge.com');

        // static関数をモックに置き換える
        // alias:MethodName でstaticメソッドを指定できる!!
        $mock = Mockery::mock('alias:Mailer');
        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello!')
            ->andReturn(true);

        $this->assertTrue($user->staticNotify('Hello!'));
    }
}
