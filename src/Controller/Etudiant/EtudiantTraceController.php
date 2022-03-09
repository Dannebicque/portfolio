<?php

namespace App\Controller\Etudiant;

use App\Entity\TraceFile;
use App\Form\TraceFileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etudiant/trace', name: 'etudiant_trace_')]
class EtudiantTraceController extends AbstractController
{
    #[Route('/depot', name: 'depot')]
    public function depot(): Response
    {
        $trace = new TraceFile();
        $form = $this->createForm(TraceFileType::class, $trace);

        return $this->renderForm('etudiant/trace/depot.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/traces', name: 'traces')]
    public function traces(): Response
    {
        return $this->render('etudiant/trace/traces.html.twig', [
        ]);
    }
}
