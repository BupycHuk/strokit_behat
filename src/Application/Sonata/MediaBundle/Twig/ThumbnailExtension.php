<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Admin
 * Date: 17.02.13
 * Time: 12:50
 * To change this template use File | Settings | File Templates.
 */
namespace Application\Sonata\MediaBundle\Twig;

use Application\Sonata\MediaBundle\Entity\Gallery;
use Sonata\MediaBundle\Model\MediaInterface;
use Sonata\MediaBundle\Twig\Extension\MediaExtension;

class ThumbnailExtension extends MediaExtension
{

    public function getFilters()
    {
        return array(
            'galleryThumb' => new \Twig_Filter_Method($this, 'galleryThumbnailFilter',array(
                'is_safe' => array('html')
            )),
            'thumb' => new \Twig_Filter_Method($this, 'thumbnailFilter',array(
                'is_safe' => array('html')
            )),
            'isHaveImage' => new \Twig_Filter_Method($this, 'isGalleryWithImageFilter',array()),

            'path' => new \Twig_Filter_Method($this, 'pathFilter',array()),
        );
    }


    /**
     * @param Gallery $gallery
     * @param string $noImagePath
     * @param string $format
     * @param array  $options
     * @return mixed|string
     */
    public function galleryThumbnailFilter($gallery,$noImagePath,$format='big',$options = array())
    {
        if ($this->isGalleryWithImageFilter($gallery))
        {
            $medias = $gallery->getGalleryHasMedias();
            return $this->thumbnail($medias[0]->getMedia(),$format,$options);
        }

        $provider = $this->getMediaService()
            ->getProvider('sonata.media.provider.image');
        $options = array_merge($options,array('src'=>$noImagePath));
        return $this->render($provider->getTemplate('helper_thumbnail'), array(
            'options'  => $options,
        ));
    }
    /**
     * @param Gallery $gallery
     * @param string $noImagePath
     * @param string $format
     * @param array  $options
     * @return mixed|string
     */
    public function pathFilter($gallery,$noImagePath,$format='big')
    {
        if ($this->isGalleryWithImageFilter($gallery))
        {
            $medias = $gallery->getGalleryHasMedias();
            return $this->path($medias[0]->getMedia(),$format);
        }

        return $noImagePath;
    }
    /**
     * @param Gallery $gallery
     * @return boolean
     */
    public function isGalleryWithImageFilter($gallery)
    {
        if ($gallery&&$gallery->getGalleryHasMedias()&&count($gallery->getGalleryHasMedias())>0)
        {
            $medias = $gallery->getGalleryHasMedias();
            if ($medias[0]->getMedia())
                return true;
        }
        return false;
    }

    public function thumbnailFilter( $media,$noImagePath,$format='big',$options = array())
    {
        $result = $this->path($media,$format,$options);
        if (!$result)
        {
            $result=$noImagePath;

            $provider = $this->getMediaService()
                ->getProvider('sonata.media.provider.image');
            $options = array_merge($options,array('src'=>$result));
            return $this->render($provider->getTemplate('helper_thumbnail'), array(
                'options'  => $options,
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'thumb_extension';
    }
}