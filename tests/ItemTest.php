<?php


use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{

    public function testGetDescription()
    {
        $item = new Item();

        $this->assertNotEmpty($item->getDescription());
    }

    // for protected method
    // 対象のクラスを継承して回避する場合
    public function testIDisAnInteger()
    {
        // 継承して、protectedをpublicへ（厳密にはpublic関数から親の関数を呼んでるだけ）
        $item = new ItemChild();

        $this->assertIsInt($item->getID());
    }

    // for private method
    // 対象のクラスを外部アクセス可能にする場合
    public function testTokenIsAString()
    {
        $item = new Item();
        // ReflectionClassで外部アクセス可能にする
        $reflector = new ReflectionClass(Item::class);
        // 対象の関数をアクセス可能にする
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    // for private method with arguments
    // 対象のクラスを外部からアクセス可能にするまた、引数指定も行う場合
    public function testGetPrefixedToken()
    {
        $item = new Item();
        // ReflectionClassで外部アクセス可能にする
        $reflector = new ReflectionClass(Item::class);
        // 対象の関数をアクセス可能にする
        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);
        // invokeArgusで、引数を渡せる
        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
