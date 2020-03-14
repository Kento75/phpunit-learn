<?php

use PHPUnit\Framework\TestCase;

// Mockeryの場合
class SampleTest extends TestCase
{

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderProcessedUsingMockery()
    {
        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}