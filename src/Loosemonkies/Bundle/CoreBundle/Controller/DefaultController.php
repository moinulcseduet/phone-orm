<?php

namespace Loosemonkies\Bundle\CoreBundle\Controller;

use Loosemonkies\Bundle\CoreBundle\Repository\PhoneRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    protected $data = array();

    /** @var PhoneRepository */
    protected $phoneRepository;

    public function init()
    {
        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json');

        $this->phoneRepository = $this->get('phone_repository');
    }

    public function indexAction($name)
    {
        return $this->render('LoosemonkiesCoreBundle:Default:index.html.twig', array('name' => $name));
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

                     ->add('images', 'file')

                     ->add('Add Phone', 'submit', array('attr' => array('class' => 'btn btn-success')))
                     ->getForm();

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {

                $formData = $form->getData();
                $imageName = $formData['images']->getClientOriginalName();

                $formData['images']->move('upload/', $imageName);
                $formData['images'] = $imageName;

                $ret = $this->phoneRepository->insert($formData);

                if (is_array($ret)) {
                    return $this->redirect('/phone/list');

                } else {
                    return $this->redirect('/phone');
                }
            }
        }

        $this->data['form'] = $form->createView();

        return $this->render('LoosemonkiesCoreBundle:Default:add.html.twig', $this->data);
    }

    public function phoneListAction()
    {
        $this->data['phones'] = $this->phoneRepository->getAll();

        return $this->render('LoosemonkiesCoreBundle:Default:list.html.twig', $this->data);
    }

    public function phoneDetailsAction($id)
    {
        $this->data['phone']  = $this->phoneRepository->getPhoneByPhoneId($id);
        $this->data['images'] = array(0,1,2,3,4,5,6);
        $this->data['id']     = $id;

        return $this->render('LoosemonkiesCoreBundle:Default:details.html.twig', $this->data);
    }

    public function phoneSearchAction()
    {
        $searchDara = $this->request->request->all();

        $this->data['phones'] = $this->phoneRepository->searchPhoneByKeyword($searchDara['searchkey']);

        return $this->render('LoosemonkiesCoreBundle:Default:search.html.twig', $this->data);
    }

    public function phoneSortAction()
    {
        $searchDara = $this->request->request->all();

        $this->data['phones'] = $this->phoneRepository->searchPhoneByKeywordWithSorting($searchDara['searchkey'], $searchDara['sortkey']);

        return $this->render('LoosemonkiesCoreBundle:Default:search.html.twig', $this->data);
    }
}
