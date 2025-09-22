<?php

namespace App\Controller;

use App\Entity\Collaboration;
use App\Entity\User;
use App\Repository\CollaborationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/collaborations')]
#[IsGranted('ROLE_USER')]
final class CollaborationController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CollaborationRepository $collaborationRepository,
        private UserRepository $userRepository
    ) {}

    #[Route('/', name: 'app_collaborations')]
    public function index(): Response
    {
        $user = $this->getUser();
        
        $ownedCollaborations = $this->collaborationRepository->findByOwner($user);
        $pendingInvitations = $this->collaborationRepository->findPendingInvitations($user);
        $myCollaborations = $this->collaborationRepository->findByCollaborator($user);

        return $this->render('collaboration/index.html.twig', [
            'ownedCollaborations' => $ownedCollaborations,
            'pendingInvitations' => $pendingInvitations,
            'myCollaborations' => $myCollaborations,
        ]);
    }

    #[Route('/invite', name: 'app_collaboration_invite', methods: ['POST'])]
    public function invite(Request $request): JsonResponse
    {
        $user = $this->getUser();
        $collaboratorEmail = $request->request->get('email');
        
        if (!$collaboratorEmail) {
            return $this->json(['error' => 'Email requis'], 400);
        }

        $collaborator = $this->userRepository->findOneBy(['email' => $collaboratorEmail]);
        
        if (!$collaborator) {
            return $this->json(['error' => 'Utilisateur introuvable'], 404);
        }

        if ($collaborator === $user) {
            return $this->json(['error' => 'Vous ne pouvez pas vous inviter vous-même'], 400);
        }

        // Check if collaboration already exists
        $existingCollaboration = $this->collaborationRepository->findCollaboration($user, $collaborator);
        if ($existingCollaboration) {
            return $this->json(['error' => 'Une invitation existe déjà pour cet utilisateur'], 400);
        }

        $collaboration = new Collaboration();
        $collaboration->setOwner($user);
        $collaboration->setCollaborator($collaborator);
        $collaboration->setRole('ROLE_COLLABORATOR_WRITE');

        $this->entityManager->persist($collaboration);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'Invitation envoyée avec succès',
            'collaboration' => [
                'id' => $collaboration->getId(),
                'collaborator' => $collaborator->getSurname(),
                'status' => $collaboration->getStatus()
            ]
        ]);
    }

    #[Route('/accept/{id}', name: 'app_collaboration_accept', methods: ['POST'])]
    public function accept(Collaboration $collaboration): JsonResponse
    {
        $user = $this->getUser();
        
        if ($collaboration->getCollaborator() !== $user) {
            return $this->json(['error' => 'Non autorisé'], 403);
        }

        if (!$collaboration->isPending()) {
            return $this->json(['error' => 'Cette invitation n\'est plus valide'], 400);
        }

        $collaboration->accept();
        $this->entityManager->flush();

        return $this->json(['message' => 'Invitation acceptée']);
    }

    #[Route('/decline/{id}', name: 'app_collaboration_decline', methods: ['POST'])]
    public function decline(Collaboration $collaboration): JsonResponse
    {
        $user = $this->getUser();
        
        if ($collaboration->getCollaborator() !== $user) {
            return $this->json(['error' => 'Non autorisé'], 403);
        }

        if (!$collaboration->isPending()) {
            return $this->json(['error' => 'Cette invitation n\'est plus valide'], 400);
        }

        $collaboration->decline();
        $this->entityManager->flush();

        return $this->json(['message' => 'Invitation refusée']);
    }

    #[Route('/remove/{id}', name: 'app_collaboration_remove', methods: ['DELETE'])]
    public function remove(Collaboration $collaboration): JsonResponse
    {
        $user = $this->getUser();
        
        if ($collaboration->getOwner() !== $user && $collaboration->getCollaborator() !== $user) {
            return $this->json(['error' => 'Non autorisé'], 403);
        }

        $this->entityManager->remove($collaboration);
        $this->entityManager->flush();

        return $this->json(['message' => 'Collaboration supprimée']);
    }
}