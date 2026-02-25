<?php

namespace App\Controller;

use App\Entity\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/partners', name: 'partner_')]
class PartnerController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    #[Route('/', name: 'list', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $repos = $this->em->getRepository(Partner::class)->findAll();
        $data = array_map(fn(Partner $p) => [
            'id' => $p->getId(),
            'type' => $p->getType(),
            'name' => $p->getName(),
            'phone' => $p->getPhone(),
            'email' => $p->getEmail(),
            'is_active' => $p->isActive(),
        ], $repos);

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $p = $this->em->getRepository(Partner::class)->find($id);
        if (!$p) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }

        return new JsonResponse([
            'id' => $p->getId(),
            'type' => $p->getType(),
            'name' => $p->getName(),
            'registration_number' => $p->getRegistrationNumber(),
            'phone' => $p->getPhone(),
            'email' => $p->getEmail(),
            'street' => $p->getStreet(),
            'city' => $p->getCity(),
            'postal_code' => $p->getPostalCode(),
            'country' => $p->getCountry(),
            'is_active' => $p->isActive(),
        ]);
    }

    #[Route('/', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true) ?? [];
        if (empty($data['type']) || empty($data['name'])) {
        return new JsonResponse(['error' => 'type and name required'], 400);
        }

        $p = new Partner();
        $p->setType((string)$data['type']);
        $p->setName((string)$data['name']);
        $p->setRegistrationNumber($data['registration_number'] ?? null);
        $p->setPhone($data['phone'] ?? null);
        $p->setEmail($data['email'] ?? null);
        $p->setWebsite($data['website'] ?? null);
        $p->setStreet($data['street'] ?? null);
        $p->setCity($data['city'] ?? null);
        $p->setPostalCode($data['postal_code'] ?? null);
        $p->setCountry($data['country'] ?? null);
        $p->setIsActive(isset($data['is_active']) ? (bool)$data['is_active'] : true);

        $this->em->persist($p);
        $this->em->flush();

        return new JsonResponse(['id' => $p->getId()], 201);
    }

    #[Route('/{id}', name: 'update', methods: ['PUT','PATCH'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $p = $this->em->getRepository(Partner::class)->find($id);
        if (!$p) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }

        $data = json_decode($request->getContent(), true) ?? [];
        if (isset($data['type'])) $p->setType((string)$data['type']);
        if (isset($data['name'])) $p->setName((string)$data['name']);
        if (array_key_exists('registration_number', $data)) $p->setRegistrationNumber($data['registration_number']);
        if (array_key_exists('phone', $data)) $p->setPhone($data['phone']);
        if (array_key_exists('email', $data)) $p->setEmail($data['email']);
        if (array_key_exists('street', $data)) $p->setStreet($data['street']);
        if (array_key_exists('city', $data)) $p->setCity($data['city']);
        if (array_key_exists('postal_code', $data)) $p->setPostalCode($data['postal_code']);
        if (array_key_exists('country', $data)) $p->setCountry($data['country']);
        if (array_key_exists('is_active', $data)) $p->setIsActive((bool)$data['is_active']);

        $p->setUpdatedAt(new \DateTimeImmutable());
        $this->em->flush();

        return new JsonResponse(['ok' => true]);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $p = $this->em->getRepository(Partner::class)->find($id);
        if (!$p) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }

        $this->em->remove($p);
        $this->em->flush();

        return new JsonResponse(null, 204);
    }
}
