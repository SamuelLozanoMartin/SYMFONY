<?php

namespace EMM\UserBundle\Controller;

use EMM\UserBundle\EMMUserBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EMM\UserBundle\Entity\User;
use EMM\UserBundle\Form\UserType;
class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('EMMUserBundle:User')->findAll();
        return $this->render('EMMUserBundle:User:index.html.twig', array('users'=>$users));
    }

    public function articlesAction(){
        return new response ('Bienvenido a mi modulo de articulos');
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('EMMUserBundle:User');
        $user = $repository->find($id);
        return new response ('usuario: ' . $user->getUsername() );
    }

    public function addAction()
    {
        $user = new user();
        $form = $this->createCreateForm($user);

        return $this->render('EMMUserBundle:User:add.html.twig',array('form'=> $form->createView()));
    }

    private function createCreateForm(User $entity)
    {
        $form =$this->createForm(new UserType(),$entity, array(
            'action'=>$this->generateUrl('emm_user_create'),
            'method'=>'POST'
        ));

        return $form;
    }

    public function createAction(Request $request)
    {
        $user = new user();
        $form = $this->createCreateForm($user);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('emm_user_index');
        }

        return $this->render('EMMUserBundle:User:add.html.twig',array('form'=> $form->createView()));
    }
}