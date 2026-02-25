<?php

namespace App\Controller;

use App\Entity\Collaboration;
use App\Entity\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/collaborations', name: 'collab_')]
class CollaborationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    #[Route('/', name: 'list', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $items = $this->em->getRepository(Collaboration::class)->findAll();
        $data = array_map(function (Collaboration $c) {
            return [
                'id' => $c->getId(),
                'partner_id' => $c->getPartner()->getId(),
                'organization_id' => $c->getOrganizationId(),
                'contract_start' => $c->getContractStart()->format('Y-m-d'),
                'contract_end' => $c->getContractEnd()?->format('Y-m-d'),
                'status' => $c->getStatus(),
            ];
        }, $items);

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $c = $this->em->getRepository(Collaboration::class)->find($id);
        if (!$c) return new JsonResponse(['error' => 'Not found'], 404);

        return new JsonResponse([
            'id' => $c->getId(),
            'partner_id' => $c->getPartner()->getId(),
            'organization_id' => $c->getOrganizationId(),
            'contract_start' => $c->getContractStart()->format('Y-m-d'),
            'contract_end' => $c->getContractEnd()?->format('Y-m-d'),
            'status' => $c->getStatus(),
            'terms' => $c->getTerms(),
        ]);
    }

    #[Route('/', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true) ?? [];
        if (empty($data['partner_id']) || empty($data['contract_start'])) {
            return new JsonResponse(['error' => 'partner_id and contract_start required'], 400);
        }

        $partner = $this->em->getRepository(Partner::class)->find((int)$data['partner_id']);
        if (!$partner) return new JsonResponse(['error' => 'Partner not found'], 404);

        $c = new Collaboration();
        $c->setPartner($partner);
        $c->setOrganizationId($data['organization_id'] ?? null);
        $c->setContractStart(new \DateTime($data['contract_start']));
        if (!empty($data['contract_end'])) $c->setContractEnd(new \DateTime($data['contract_end']));
        if (!empty($data['status'])) $c->setStatus($data['status']);
        $c->setTerms($data['terms'] ?? null);

        $this->em->persist($c);
        $this->em->flush();

        return new JsonResponse(['id' => $c->getId()], 201);
    }

    #[Route('/{id}', name: 'update', methods: ['PUT','PATCH'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $c = $this->em->getRepository(Collaboration::class)->find($id);
        if (!$c) return new JsonResponse(['error' => 'Not found'], 404);

        $data = json_decode($request->getContent(), true) ?? [];
        if (!empty($data['partner_id'])) {
            $partner = $this->em->getRepository(Partner::class)->find((int)$data['partner_id']);
            if ($partner) $c->setPartner($partner);
        }
        if (array_key_exists('organization_id', $data)) $c->setOrganizationId($data['organization_id']);
        if (!empty($data['contract_start'])) $c->setContractStart(new \DateTime($data['contract_start']));
        if (array_key_exists('contract_end', $data)) $c->setContractEnd($data['contract_end'] ? new \DateTime($data['contract_end']) : null);
        if (array_key_exists('status', $data)) $c->setStatus($data['status']);
        if (array_key_exists('terms', $data)) $c->setTerms($data['terms']);

        $c->setUpdatedAt(new \DateTimeImmutable());
        $this->em->flush();

        return new JsonResponse(['ok' => true]);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $c = $this->em->getRepository(Collaboration::class)->find($id);
        if (!$c) return new JsonResponse(['error' => 'Not found'], 404);

        $this->em->remove($c);
        $this->em->flush();

        return new JsonResponse(null, 204);
    }
}
