<?php
/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\NewsBundle\Controller;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\NewsBundle\Controller\PostController as BaseController;

class PostController extends BaseController
{
    /**
     * @param array $criteria
     * @param array $parameters
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainAction()
    {
        $pager = $this->getPostManager()->getPager(
            array(),
            $this->getRequest()->get('page', 1),
            3
        );

        $parameters = array(
            'pager' => $pager,
            'blog'  => $this->get('sonata.news.blog'),
            'tag'   => false,
            'route' => $this->getRequest()->get('_route'),
            'route_parameters' => $this->getRequest()->get('_route_params')
        );

        $response = $this->render('ApplicationSonataNewsBundle:Post:main.html.twig', $parameters);

        if ('rss' === $this->getRequest()->getRequestFormat()) {
            $response->headers->set('Content-Type', 'application/rss+xml');
        }

        return $response;
    }
}
