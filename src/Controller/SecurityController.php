<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $lastUsername = $authenticationUtils->getLastUsername();
        dump($lastUsername);
        $errors = $authenticationUtils->getLastAuthenticationError();
        dump($authenticationUtils);
        return $this->render('security/login.html.twig', ['lastUsername' => $lastUsername, 'errors' =>
        $errors]);
    }

    /**
     *  @Route("/logout", name="security_logout")
     */
    public function logout($login): Response
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/inscription", name="security_inscription")
     */
    public function inscription(Request $request): Response
    {
        $unParticipant = new User();
        $form = $this->createForm(UserType::class, $unParticipant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unParticipant);
            $em->flush();
            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/inscription.html.twig', [
            'monForm' => $form->createView(),
        ]);
    }
}
