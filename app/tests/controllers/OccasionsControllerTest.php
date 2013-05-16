<?php

use Mockery as m;

class OccasionsControllerTest extends Zizaco\TestCases\ControllerTestCase
{
    use TestHelper;

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

        // Make sure that search and paginate will be called at leas
        // once
        $occasionRepo = m::mock(new OccasionRepository);
        $occasionRepo->shouldReceive('search')->once()->passthru();
        $occasionRepo->shouldReceive('paginate')->once()->passthru();
        App::instance("OccasionRepository", $occasionRepo);

        // Do request
        $this->requestUrl('GET', 'occasions');
        $this->assertRequestOk();
    }

}
