<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.14
 * Time: 22:44
 */

namespace Strokit\SearchBundle\Searcher;


interface ISearcher {

    function find($searchText);
    function getName();
} 