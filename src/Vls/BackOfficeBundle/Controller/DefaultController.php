<?php

namespace Vls\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vls\CoreBundle\Entity\User;
use Vls\BackOfficeBundle\Form\SocialType;
use Vls\BackOfficeBundle\Form\AboutType;
use Vls\BackOfficeBundle\Form\PortfolioType;
use Vls\BackOfficeBundle\Form\CertificateType;
use Vls\CoreBundle\Entity\Portfolio;
use Vls\CoreBundle\Entity\Certificate;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VlsBackOfficeBundle:Default:index.html.twig');
    }

    public function portfolioAction(Request $request)
    {
        $portfolios = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:Portfolio')
          ->findAll();

        $portfolio = new Portfolio;

        $portfolioForm = $this->get('form.factory')->create(PortfolioType::class, $portfolio);

        if ($request->isMethod('POST')) {
            $portfolioForm->handleRequest($request);

            if ($portfolioForm->isValid()) {
                $portfolio->upload();

                $em = $this->getDoctrine()->getManager();
                $em->persist($portfolio);
                $em->flush();

                $request->getSession()->getFlashBag()->add('info', 'Le portfolio à bien été ajouté');

                return $this->redirectToRoute('vls_back_office_portfolio');
            }
        }

        return $this->render('VlsBackOfficeBundle:Default:portfolio.html.twig', array(
            'portfolios' => $portfolios,
            'portfolioForm' => $portfolioForm->createView()
        ));
    }

    public function certificateAction(Request $request)
    {
        $certificates = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:Certificate')
          ->findAll();

        $certificate = new Certificate;

        $certificateForm = $this->get('form.factory')->create(CertificateType::class, $certificate);

        if ($request->isMethod('POST')) {
            $certificateForm->handleRequest($request);

            if ($certificateForm->isValid()) {
                $certificate->upload();

                $em = $this->getDoctrine()->getManager();
                $em->persist($certificate);
                $em->flush();

                $request->getSession()->getFlashBag()->add('info', 'Le certificat à bien été ajouté');

                return $this->redirectToRoute('vls_back_office_certificate');
            }
        }

        return $this->render('VlsBackOfficeBundle:Default:certificates.html.twig', array(
            'certificates' => $certificates,
            'certificateForm' => $certificateForm->createView()
        ));
    }

    public function aboutAction(Request $request)
    {
        $user = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:User')
          ->find(1);

        $aboutForm = $this->get('form.factory')->create(AboutType::class, $user);

        if ($request->isMethod('POST')) {
            $aboutForm->handleRequest($request);

            if ($aboutForm->isValid()) {
                $user->uploadAboutImage();
                $user->uploadAvatar();
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

              $request->getSession()->getFlashBag()->add('info', 'Les valeurs ont bien enregistrées.');

              return $this->redirectToRoute('vls_back_office_about');
            }
        }

        return $this->render('VlsBackOfficeBundle:Default:about.html.twig', array(
            'aboutForm' => $aboutForm->createView(),
            'user' => $user
        ));
    }

    public function socialAction(Request $request)
    {
        $user = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('VlsCoreBundle:User')
          ->find(1);

<<<<<<< HEAD
        $socialForm = $this->get('form.factory')->create(SocialType::class, $user);

        if ($request->isMethod('POST')) {
            $socialForm->handleRequest($request);

            if ($socialForm->isValid()) {
              $em = $this->getDoctrine()->getManager();
              $em->persist($user);
              $em->flush();

              $request->getSession()->getFlashBag()->add('info', 'Les valeurs ont bien enregistrées.');

              return $this->redirectToRoute('vls_back_office_social');
            }
        }

        return $this->render('VlsBackOfficeBundle:Default:social.html.twig', array(
            'socialForm' => $socialForm->createView(),
=======
        $socialForm = $this->get('form.factory')->create(SocialType::class, $user);

        if ($request->isMethod('POST')) {
            $socialForm->handleRequest($request);

            if ($socialForm->isValid()) {
              $em = $this->getDoctrine()->getManager();
              $em->persist($user);
              $em->flush();

              $request->getSession()->getFlashBag()->add('info', 'Les valeurs ont bien enregistrées.');

              return $this->redirectToRoute('vls_back_office_social');
            }
        }

        return $this->render('VlsBackOfficeBundle:Default:social.html.twig', array(
            'socialForm' => $socialForm->createView(),
>>>>>>> d3af93d11494b1948166e464d651a147adfd966e
        ));
    }
}
