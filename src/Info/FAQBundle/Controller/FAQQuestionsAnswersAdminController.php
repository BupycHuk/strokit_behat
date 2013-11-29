<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 29.11.13
 * Time: 22:50
 */

namespace Info\FAQBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Sonata\AdminBundle\Controller\CRUDController;

class FAQQuestionsAnswersAdminController extends CRUDController{

    public function answerAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("InfoFAQBundle:FaqQuestionsAnswers")->find($request->query->get('id',0));
        if (!$entity){
            throw $this->createNotFoundException('Вопросы и ответы не найдены');
        }
    }

} 