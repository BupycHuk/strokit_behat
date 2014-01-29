<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 29.01.14
 * Time: 0:13
 */

namespace Strokit\SearchBundle\Dto;


class SearchResult {

    private $title;
    private $content;
    private $url;
    private $isPopup;

    public function __construct($title,$content,$url,$isPopup)
    {

        $this->title = $title;
        $this->content = $content;
        $this->url = $url;
        $this->isPopup = $isPopup;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getIsPopup()
    {
        return $this->isPopup;
    }

} 