<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 02.12.13
 * Time: 22:26
 */

namespace Info\FAQBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Sonata\AdminBundle\Controller\CRUDController;

class FAQCommentsAdminController extends CRUDController{

    public function answerAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("InfoFAQBundle:FaqComments")->find($request->query->get('id',0));
        if (!$entity){
            throw $this->createNotFoundException('Комментарий не найден');
        }

        $form = $this->createFormBuilder()
            ->add('title', 'text', array('label'=>'Заголовок письма *', 'attr'=>array('value'=>"Комментарий в системе Элсом")))
            ->add('content', 'textarea', array('label'=>'Комментарий *'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()){
            $data = $form->getData();
            $message = \Swift_Message::newInstance()
                ->setSubject($data['title'])
                ->setFrom($this->container->getParameter('email_from'))
                ->setTo($entity->getEmail())
                ->setBody(
                    $data['content'],
                    'text/html'
                )
            ;
            $entity->setAnswered(true);
            $entity->setAnswer($data['content']);
            $em->flush();
            $this->get('mailer')->send($message);
            $this->container->get('session')->getFlashBag()->add('success', 'Письмо пользователю отправлено');
        }


        return $this->render('InfoFAQBundle:FaqAdmin:index.html.twig', array(
            'entity'    => $entity,
            'form'      => $form->createView()
        ));
    }

} 