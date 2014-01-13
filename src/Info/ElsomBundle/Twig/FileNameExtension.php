<?php

namespace Info\ElsomBundle\Twig;

class FileNameExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'fileToTitle' => new \Twig_Filter_Method($this, 'fileToTitleFilter'),
            'fileToExt' => new \Twig_Filter_Method($this, 'fileToExtFilter'),
        );
    }

    public function fileToTitleFilter($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $title = substr($file,0,-(strlen('.'.$ext)));
        return $title;
    }

    public function fileToExtFilter($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        return $ext;
    }

    public function getName()
    {
        return 'elsoom_fileName_extension';
    }
}
