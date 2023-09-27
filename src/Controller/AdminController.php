<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_dashboard', methods: ['GET'])]
    public function dashboard(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/login', name: 'app_admin_login', methods: ['GET'])]
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }

    # REGISTER ADMIN
    # Do not uncomment this code on production server
    # This is just for demo purpose
    
    // #[Route('/register/admin', name: 'app_admin_register', methods: ['POST'])]
    // public function registerAdmin(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordHasher): Response
    // {
    //     $em = $doctrine->getManager();
    //     $decoded = json_decode($request->getContent());
    //     $email = $decoded->email;
    //     $plaintextPassword = $decoded->password;
  
    //     $user = new User();
    //     $hashedPassword = $passwordHasher->hashPassword(
    //         $user,
    //         $plaintextPassword
    //     );
    //     $user->setPassword($hashedPassword);
    //     $user->setEmail($email);
    //     $user->setRoles(['ROLE_ADMIN']);
    //     $em->persist($user);
    //     $em->flush();

    //     return $this->json(['message' => 'Registered Successfully']);
    // }
}