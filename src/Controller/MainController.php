<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Entity\Post;
use App\Entity\ResourceFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'main_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $post = $entityManager->getRepository(Post::class)->find(2);
        $resourceFile = $entityManager->getRepository(ResourceFile::class)->find(1);

        $copy = clone $resourceFile;

        dump($copy);

        return $this->render('default/homepage.html.twig');
    }
}
