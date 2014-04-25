<?php

namespace Loosemonkies\Bundle\CoreBundle\Controller;

use Loosemonkies\Bundle\CoreBundle\Entity\Phone;
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

                     ->add('images', 'file', array(
                        'label' => 'Images (Select single or multiple image file)',
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

                $images = $formData['images'];

                if (count($images[0]) > 0){

                    foreach($formData['images'] as $image) {

                        $imageName = $image->getClientOriginalName();

                        $image->move('upload/', $imageName);
                        $imageNames[] = $imageName;
                    }

                    $formData['images'] = implode(',', $imageNames);

                } else {
                    $formData['images'] = '';
                }

                $ret = $this->phoneRepository->insert($formData);

                if (is_array($ret)) {
                    return $this->redirect('/phone/list');

                } else {
                    return $this->redirect('/phone');
                }
            }
        }

        $formView = $form->createView();

        $formView->children['images']->vars['full_name'] = $formView->children['images']->vars['full_name'].'[]';

        $this->data['form'] = $formView;
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

    public function phoneEditAction($id, Request $request)
    {
        $formExistData = $this->phoneRepository->getPhoneByPhoneId($id);

        $phone = new Phone();

        $phone->setAge($formExistData['age']);
        $phone->setName($formExistData['name']);
        $phone->setSnippet($formExistData['snippet']);
        $phone->setDescription($formExistData['description']);
        $phone->setPhoneId($formExistData['phone_id']);

        $form = $this->createFormBuilder($phone)
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
                        'label' => 'Images (Select single or multiple image file)',
                        'required' => false,
                        'attr' => array(
                            'accept' => 'image/*',
                            'multiple' => true
                        )))

                     ->add('Update Phone', 'submit', array('attr' => array('class' => 'btn btn-success')))
                     ->getForm();

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {

                $formData = $form->getData();

                $imageNames = array();

                $images = $formData->getImages();

                if (count($images[0]) > 0){

                    $existsImg = explode(',', $formExistData['images']);

                    foreach($existsImg as $unlink_img) {
                        if (file_exists('upload/'.$unlink_img)) {
                            unlink('upload/'.$unlink_img);
                        }
                    }

                    foreach($images as $image) {

                        $imageName = $image->getClientOriginalName();

                        $image->move('upload/', $imageName);
                        $imageNames[] = $imageName;
                    }

                    $img = implode(',', $imageNames);

                } else {
                    $img = null;
                }

                $newFormData['age'] = $formData->getAge();
                $newFormData['name'] = $formData->getName();
                $newFormData['phone_id'] = $formData->getPhoneId();
                $newFormData['snippet'] = $formData->getSnippet();
                $newFormData['description'] = $formData->getDescription();
                $newFormData['images'] = $img;

                $ret = $this->phoneRepository->update($formExistData['id'], $newFormData);

                if (is_array($ret)) {
                    return $this->redirect('/phone/list');

                } else {
                    return $this->redirect('/phone-edit/'.$formExistData['phone_id']);
                }
            }
        }

        $formView = $form->createView();

        $formView->children['images']->vars['full_name'] = $formView->children['images']->vars['full_name'].'[]';
        $this->data['form'] = $formView;

        $this->data['images'] = $formExistData['images'];

        return $this->render('LoosemonkiesCoreBundle:Default:edit.html.twig', $this->data);
    }

    public function phoneDeleteAction($id)
    {
        $data = $this->phoneRepository->getPhoneByPhoneId($id);

        if (empty($data)) {
            return $this->redirect('/phone/list');
        }

        $existsImg = explode(',', $data['images']);

        foreach($existsImg as $unlink_img) {
            if (file_exists('upload/'.$unlink_img)) {
                unlink('upload/'.$unlink_img);
            }
        }

        $delete = $this->phoneRepository->delete($id);

        if ($delete) {
            return $this->redirect('/phone/list');
        }

        echo 'Can not delete the phone!';
    }
}
