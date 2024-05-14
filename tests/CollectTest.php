<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase{
    public function testCount()
    {
        $collect = new Collect\Collect([13, 17]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $keys = $collect->keys()->toArray();
        $this->assertEquals(['a', 'b', 'c'], $keys);
    }

    public function testValues()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $values = $collect->values()->toArray();
        $this->assertEquals([1, 2, 3], $values);
    }

    public function testToArray()
    {
        $collect = new Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $this->assertEquals(['a' => 13, 'b' => 17, 'c' => 20], $collect->toArray());
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(1, $collect->get('a'));
    }

    public function testExcept()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);
        $except = $collect->except(['a', 'c'])->toArray();
        $this->assertEquals(['b' => 2, 'd' => 4], $except);
    }

    public function testOnly()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);
        $only = $collect->only(['a', 'c'])->toArray();
        $this->assertEquals(['a' => 1, 'c' => 3], $only);
    }

    public function testFirst()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(1, $collect->first());
    }

    public function testPush()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->push(4);
        $this->assertEquals([1, 2, 3, 4], $collect->toArray());
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->unshift(0);
        $this->assertEquals([0, 1, 2, 3], $collect->toArray());
    }

    public function testShift()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $collect->shift();
        $this->assertEquals([2, 3], $collect->toArray());
    }

    public function testPop()
    {
        $collect = new Collect\Collect([1, 2, 3]);
        $popped = $collect->pop()->toArray();
        $this->assertEquals([1, 2], $popped);
    }

    public function testSplice()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5]);
        $splice = $collect->splice(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5], 2, 2)->toArray();
        $this->assertEquals(['c' => 3, 'd' => 4], $splice);
    }
}