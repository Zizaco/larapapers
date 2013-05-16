<?php

class OccasionRepository
{
    public $perPage = 60;

    /**
     * Should return a cursor of Resources. If there is
     * a term of the search, bring only resource with that
     * name. If a kind is specified, brings only resource
     * of that type
     *
     * @param $terms String to search in title or lm of resource
     * @param $deactivated Display deactivated resources
     * @return OdmCursor The results
     */
    public function search( $terms = null, $deactivated = null )
    {
        if (! $terms)
        {
            $query = array();
        }
        else
        {
            $query = [ '$or'=> [
                ['name'=> new \MongoRegex('/^'.$terms.'/i')],
                ['lm'=> new \MongoRegex('/^'.$terms.'/i')]
            ]];            
        }

        if($deactivated != 'true')
        {
            $query = array_merge($query,['deactivated'=>null]);
        }

        $resources = Occasion::where($query);

        return $resources;
    }

    /**
     * Return the ammount of pages that a cursor should
     * have considering the $this->perPage
     *
     * @param $cursor An OdmCursor
     * @return int Ammount of pages
     */
    public function pageCount( $cursor )
    {
        $count = $cursor->count();

        if(is_numeric($count) && $count > 0)
            return round($cursor->count()/$this->perPage);

        return 0;
    }

    /**
     * Return the $cursor paginated using the $perPage
     * attribute. A $page may be specified in order to
     * skip some of the resource
     *
     * @param $cursor The cursor to be paginated
     * @param $page The page that are gonna be returned
     * @return OdmCursor Paginated cursor.
     */
    public function paginate( $cursor, $page = null )
    {
        if(! $page)
            $page = 1;

        return $cursor->limit( $this->perPage )
            ->skip( ($page-1)*$this->perPage );
    }
}
