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

    protected function another_valid_occasion()
    {
        return [
            '_id' => new MongoId( '32f1423d8ead0e1d38000002' ),
            'name' => 'Random Event B',
            'slug' => 'random_event_b',
            'tags' => 'programming, ruby, rails',
        ];
    }

    protected function other_valid_occasion()
    {
        return [
            '_id' => new MongoId( '32f1423d8ead0e1d38000003' ),
            'name' => 'Random Event C',
            'slug' => 'random_event_c',
            'tags' => 'programming, js',
        ];
    }

}
