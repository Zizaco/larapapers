<?php

use Mockery as m;

class OccasionsControllerTest extends Zizaco\TestCases\ControllerTestCase
{
    /**
     * Clean collection between every test
     */
    public function setUp()
    {
        parent::setUp();

        $this->cleanCollection( 'contents' );
    }

    /**
     * Mockery close
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * Index action should always return 200
     *
     */
    public function testShouldIndex(){

        // Do request
        $this->requestUrl('GET', 'occasions');
        $this->assertRequestOk();
    }

    /**
     * Clean database collection
     */
    protected function cleanCollection( $collection )
    {
        $database = Config::get('database.mongodb.default.database');

        $connector = new Zizaco\Mongolid\MongoDbConnector;
        $connection = $connector->getConnection();

        $connection->$database->$collection->drop();
    }
}
