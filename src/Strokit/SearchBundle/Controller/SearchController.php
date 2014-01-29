<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.01.14
 * Time: 22:19
 */

namespace Strokit\SearchBundle\Controller;


use Strokit\SearchBundle\Form\SearchType;
use Strokit\SearchBundle\Searcher\ISearcher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller {

    public function indexAction()
    {

        $form = $this->createForm(new SearchType());
        $request = $this->getRequest();
        if ($request->isMethod('GET')) {
            $form->submit($request);
            $searchText =$form->get('search')->getData();
            /** @var $searcher ISearcher */
            $searcher =$this->container->get('strokit.searcher');
            $results = $searcher->find($searchText);
            return $this->render('StrokitSearchBundle:Search:index.html.twig',array('searchText'=>$searchText,'results'=>$results));
        }
        else
        {
            Throw new \HttpRequestMethodException('Запрос не верен');
        }
    }

    public function showFormAction()
    {
        $form = $this->createForm(new SearchType());

        return $this->render('StrokitSearchBundle:Search:searchForm.html.twig',array('form'=>$form->createView()));
    }

} 