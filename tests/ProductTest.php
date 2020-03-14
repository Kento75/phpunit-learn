<?php


use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    // 対象クラスのフィールドの値がprotectedまたはprivateの場合
    // ReflectionClassを使って対応
    public function testIDIsAnInteger()
    {
        $product = new Product();

        $reflector = new ReflectionClass(Product::class);
        // getPropertyで指定したフィールドが取得できるようになる
        $property = $reflector->getProperty('product_id');
        $property->setAccessible(true);
        $value = $property->getValue($product);

        $this->assertIsInt($value);
    }
}
