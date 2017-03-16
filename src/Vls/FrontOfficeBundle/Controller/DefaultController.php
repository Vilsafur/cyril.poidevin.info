<?php

namespace Vls\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vls\CoreBundle\Entity\User;
use Vls\FrontOfficeBundle\Entity\Enquiry;
use Vls\FrontOfficeBundle\Form\EnquiryType;

/**
 * TODO Integration des différentes variables :
 *      - Utilisateurs
 */

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:User')
          ->find(1);

        $portfolios = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:Portfolio')
          ->findAll();

        $certificates = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:Certificate')
          ->findAll();

        $enquiry = new Enquiry();
        $form = $this->get('form.factory')->create(EnquiryType::class, $enquiry);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Message en provenance du site personnel')
                    ->setFrom($enquiry->getEmail())
                    ->setTo('vilsafur@gmail.com')
                    ->setBody($this->renderView('VlsFrontOfficeBundle:Emails:contact.html.twig', array('enquiry' => $enquiry)), 'text/html');
                $this->get('mailer')->send($message);
                return $this->redirectToRoute('vls_front_office_homepage');
            }
        }

        return $this->render('VlsFrontOfficeBundle:Default:index.html.twig', array(
            'user' => $user,
            'portfolios' => $portfolios,
            'certificates' => $certificates,
            'form' => $form->createView()
        ));
    }
}
