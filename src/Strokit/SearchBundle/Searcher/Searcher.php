<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.14
 * Time: 22:44
 */

namespace Strokit\SearchBundle\Searcher;


class Searcher implements ISearcher{

    /**
     * @var
     */
    private $searchers;

    public function __construct($searchers)
    {

        $this->searchers = $searchers;
    }

    public function find($searchText)
    {
        $result = array();
        foreach($this->searchers as $searcher)
        {
            /** @var $searcher ISearcher */
            $results = $searcher->find($searchText);
            if (count($results)>0)
                $result[$searcher->getName()] = $results;
        }
        return $result;
    }

    function getName()
    {
        return 'strokit_search';
    }
}