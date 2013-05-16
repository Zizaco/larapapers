<?php

class testOccasionProvider extends testObjectProvider
{
    public static $model = 'Occasion';

    protected function valid_occasion()
    {
        return [
            '_id' => new MongoId( '32f1423d8ead0e1d38000001' ),
            'name' => 'Random Event A',
            'slug' => 'random_event_a',
            'tags' => 'programming, php, laravel',
        ];
    }

}
