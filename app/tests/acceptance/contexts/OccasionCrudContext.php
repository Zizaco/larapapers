<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

class OccasionCrudContext extends BaseContext {

    /**
     * @Given /^A clean "([^"]*)" collection$/
     */
    public function aCleanCollection($collection)
    {
        $connection = App::make('MongoLidConnector')->getConnection();
        $database = Config::get(
            'database.mongodb.default.database',
            'mongolid'
        );

        $connection->$database->$collection->drop();
        $this->testCase()->assertEquals(
            0, $connection->$database->$collection->count()
        );
    }
}
