<?php

use Mockery as m;

class OccasionRepositoryTest extends Zizaco\TestCases\TestCase
{
    use TestHelper;

    /**
     * Clean collection between every test
     */
    public function setUp()
    {
        parent::setUp();
        $this->cleanCollection( 'occasions' );
    }

    /**
     * Mockery close
     */
    public function tearDown()
    {
        m::close();
    }

    public function testShouldSearch()
    {
        testOccasionProvider::saved('valid_occasion');

        $repo = new OccasionRepository;

        // Search for all
        $result = $repo->search();
        $this->assertEquals(Occasion::all()->toArray(), $result->toArray());

        // Search by name
        $result = $repo->search( 'Coisa' );
        $equivalentQuery = ['name'=> new \MongoRegex('/^Coisa/i')];
        $this->assertEquals(Occasion::where($equivalentQuery)->toArray(), $result->toArray());
    }

    public function testShouldGetPageCount()
    {
        testOccasionProvider::saved('valid_occasion');
        testOccasionProvider::saved('another_valid_occasion');
        testOccasionProvider::saved('other_valid_occasion');

        $repo = new OccasionRepository;
        $result = $repo->search();

        $repo->perPage = 6;
        $this->assertEquals(1, $repo->pageCount($result));

        $repo->perPage = 2;
        $this->assertEquals(2, $repo->pageCount($result));

        $repo->perPage = 1;
        $this->assertEquals(3, $repo->pageCount($result));
    }

    public function testShouldPaginate()
    {
        testOccasionProvider::saved('valid_occasion');
        testOccasionProvider::saved('another_valid_occasion');
        testOccasionProvider::saved('other_valid_occasion');

        $repo = new OccasionRepository;
        
        // 6 per page, first page
        $testingResult = $repo->search();
        $result = $repo->search();

        $repo->perPage = 6;
        $page = 1;
        $should_be = $testingResult
            ->limit(6)
            ->skip( ($page-1)*6 );

        $this->assertEquals($should_be->toArray(), $repo->paginate($result, $page)->toArray());

        // 2 per page, first page
        $testingResult = $repo->search();
        $result = $repo->search();

        $repo->perPage = 2;
        $page = 1;
        $should_be = $testingResult
            ->limit(2)
            ->skip( ($page-1)*2 );

        $this->assertEquals($should_be->toArray(), $repo->paginate($result, $page)->toArray());

        // 2 per page, second page
        $testingResult = $repo->search();
        $result = $repo->search();

        $repo->perPage = 2;
        $page = 2;
        $should_be = $testingResult
            ->limit(2)
            ->skip( ($page-1)*2 );

        $this->assertEquals($should_be->toArray(), $repo->paginate($result, $page)->toArray());

        // 1 per page, second page
        $testingResult = $repo->search();
        $result = $repo->search();

        $repo->perPage = 1;
        $page = 2;
        $should_be = $testingResult
            ->limit(1)
            ->skip( ($page-1)*1 );

        $this->assertEquals($should_be->toArray(), $repo->paginate($result, $page)->toArray());
    }
    
}
