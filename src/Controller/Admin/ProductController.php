<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/product', name: 'admin_product_')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, ProductRepository $repo): Response
    {
        $page = max(1, $request->query->getInt('page', 1));
        $limit = 10;
        $products = $repo->findAllPaginated($page, $limit);
        $total = $repo->countAll();

        return $this->render('admin/product/index.html.twig', [
            'products' => $products,
            'currentPage' => $page,
            'totalPages' => (int) ceil($total / $limit),
            'total' => $total,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($product);
            $em->flush();
            $this->addFlash('success', 'Product created successfully.');
            return $this->redirectToRoute('admin_product_index');
        }

        return $this->render('admin/product/form.html.twig', [
            'form' => $form,
            'product' => $product,
            'is_edit' => false,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Product $product): Response
    {
        return $this->render('admin/product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Product $product, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Product updated successfully.');
            return $this->redirectToRoute('admin_product_index');
        }

        return $this->render('admin/product/form.html.twig', [
            'form' => $form,
            'product' => $product,
            'is_edit' => true,
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Product $product, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->request->get('_token'))) {
            $em->remove($product);
            $em->flush();
            $this->addFlash('success', 'Product deleted successfully.');
        }

        return $this->redirectToRoute('admin_product_index');
    }
}
