<?php

namespace App\Controller\Personnel;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personnel', name: 'personnel_homepage_')]
class PersonnelHomepageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('personnel/homepage/index.html.twig', [
        ]);
    }
}
