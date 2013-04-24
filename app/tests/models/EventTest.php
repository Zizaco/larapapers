<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff as f;

class EventTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testShouldSaveEvent()
    {
        $event = f::create('Event');
        $this->assertTrue($event->save());
    }
}
