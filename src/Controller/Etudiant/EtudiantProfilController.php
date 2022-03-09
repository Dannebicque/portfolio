<?php

namespace App\Controller\Etudiant;

use App\Form\EtudiantProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etudiant/profil', name: 'etudiant_profil_')]
class EtudiantProfilController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $form = $this->createForm(EtudiantProfilType::class, $this->getUser());

        return $this->renderForm('etudiant/profil/index.html.twig', [
            'form' => $form,
        ]);
    }

}
