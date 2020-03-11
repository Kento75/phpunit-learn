<?php


use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    public function testNewQueueIsEmpty()
    {
        $queue = new Queue;
        $this->assertEquals(0, $queue->getCount());
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAnItemIsAddedToTheQueue(Queue $queue)
    {
        $queue->push('green');

        $this->assertEquals(1, $queue->getCount());
    }

    /**
     * @depends testAnItemIsAddedToTheQueue
     */
    public function testAnItemIsRemovedFromTheQueue(Queue $queue)
    {
        $queue->pop();

        $this->assertEquals(0, $queue->getCount());
    }
}
