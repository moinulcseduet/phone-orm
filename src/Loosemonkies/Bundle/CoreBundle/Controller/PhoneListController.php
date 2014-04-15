<?php

/*
 * This file is part of the LM Service project.
 *
 * (c) Loosemonkies.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Loosemonkies\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Loosemonkies\Bundle\CoreBundle\Repository\PhoneListRepository;

class PhoneListController extends BaseController
{
    protected $data = array();

    /** @var PhoneListRepository */
    protected $phoneListRepository;

    public function init()
    {
        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json');

        $this->phoneListRepository = $this->get('phone_list_repository');
    }

    public function addPhoneAction(Request $request)
    {
        $form = $this->createFormBuilder()
                     ->add('name', 'text',
                        array(
                            'attr' => array('placeholder' => 'Enter phone name')
                        ))
                             ->add('phone_id', 'text',
                        array(
                            'attr' => array('placeholder' => 'Enter phone id')
                        ))
                             ->add('age', 'text',
                        array(
                            'attr' => array('placeholder' => 'Enter phone age')
                        ))
                             ->add('snippet', 'text',
                        array(
                            'attr' => array('placeholder' => 'Enter phone snippet')
                        ))
                             ->add('description', 'text',
                        array(
                            'attr' => array('placeholder' => 'Enter phone description')
                        ))

                     ->add('images', 'file', array(
                        'label' => 'Images',
                        'required' => false,
                        'attr' => array(
                            'accept' => 'image/*',
                            'multiple' => true
                        )))

                     ->add('Add Phone', 'submit', array('attr' => array('class' => 'btn btn-success')))
                     ->getForm();

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {

                $formData = $form->getData();

                $imageNames = array();

                foreach($formData['images'] as $image) {

                    $imageName = $image->getClientOriginalName();

                    $image->move('upload/odm/', $imageName);
                    $imageNames[] = $imageName;
                }

                $formData['images'] = implode(',', $imageNames);

                $ret = $this->phoneListRepository->insert($formData);

                if (is_array($ret->toArray())) {
                    return $this->redirect('/phone/odm-list');

                } else {
                    return $this->redirect('/phone/odm-add');
                }
            }
        }

        $formView = $form->createView();

        $formView->children['images']->vars['full_name'] = $formView->children['images']->vars['full_name'].'[]';

        $this->data['form'] = $formView;

        return $this->render('LoosemonkiesCoreBundle:Phone:add.html.twig', $this->data);
    }

    public function phoneListAction()
    {
        $this->data['phones'] = $this->phoneListRepository->getAll();

        return $this->render('LoosemonkiesCoreBundle:Phone:list.html.twig', $this->data);
    }

    public function phoneDetailsAction($id)
    {
        $this->data['phone']  = $this->phoneListRepository->getPhoneByPhoneId($id);

        return $this->render('LoosemonkiesCoreBundle:Phone:details.html.twig', $this->data);
    }

    public function phoneSearchAction()
    {
        $searchDara = $this->request->request->all();

        $this->data['phones'] = $this->phoneListRepository->searchPhoneByKeyword($searchDara['searchkey']);

        return $this->render('LoosemonkiesCoreBundle:Phone:search.html.twig', $this->data);
    }

    public function phoneSortAction()
    {
        $searchDara = $this->request->request->all();

        $this->data['phones'] = $this->phoneListRepository->searchPhoneByKeywordWithSorting($searchDara['searchkey'], $searchDara['sortkey']);

        return $this->render('LoosemonkiesCoreBundle:Phone:search.html.twig', $this->data);
    }

}