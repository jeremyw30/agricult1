<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FermeController extends AbstractController
{
    #[Route('/ferme', name: 'app_ferme')]
    public function index(): Response
    {
        // Notes par défaut
        $notes = [
            [
                'title' => 'Vérifier la clôture',
                'content' => 'Inspection du grillage nord avant la pluie.',
                'date' => new \DateTime('2025-09-23'),
            ],
            [
                'title' => 'Appeler le vétérinaire',
                'content' => 'RDV pour les vaches laitières (lot A).',
                'date' => new \DateTime('2025-09-24'),
            ],
        ];

        // Ajout d'une note si formulaire soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['note_title'] ?? '';
            $content = $_POST['note_content'] ?? '';
            if ($title && $content) {
                $notes[] = [
                    'title' => htmlspecialchars($title),
                    'content' => htmlspecialchars($content),
                    'date' => new \DateTime(),
                ];
            }
        }

        return $this->render('ferme/index.html.twig', [
            'controller_name' => 'FermeController',
            'notes' => $notes,
        ]);
    }
}
