<?php


use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{

    // 抽象クラスの関数をテストする場合
    // AbstractPersonを継承したDoctorクラスを用意して、そちらで確認を取る
    public function testGetNameAndTitle()
    {
        // AbstractPersonを継承したDoctorクラスを使う
        $doctor = new Doctor('Green');

        $this->assertEquals('Dr. Green', $doctor->getNameAndTitle());
    }

    // 抽象クラスの関数をテストする場合その２
    // Mockを使って確認する場合
    public function testGetNameAndTitleWithMock()
    {
        // 抽象クラスを継承したMockを作成
        // 作成時にコンストラクタに値を渡す
        $mock = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Green'])
            ->getMockForAbstractClass();

        // getTitle関数は Dr. を返すようにする
        $mock->method('getTitle')
            ->willReturn('Dr.');

        $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
    }
}
