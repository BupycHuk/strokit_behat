<?php

namespace Acme\BehatBundle\Controller;

use Acme\BehatBundle\Entity\Post;
use Acme\BehatBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AcmeBehatBundle:Post');

        return $this->render('AcmeBehatBundle:Post:index.html.twig',array('posts'=>$repository->findAll()));
    }

    public function createAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(new PostType(),$post);

        if ($request->isMethod('POST'))
        {
            $form->submit($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($post);
                $em->flush();
                $this->get('session')->getFlashBag()->set('notice','пост сохранен');
            }
            else
            {
                $this->get('session')->getFlashBag()->set('notice','пост не сохранен');
            }
        }
        return $this->render('AcmeBehatBundle:Post:create.html.twig',array('form'=>$form->createView()));
    }
}
