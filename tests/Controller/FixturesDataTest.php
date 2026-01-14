<?php

namespace App\Tests\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\EditorRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FixturesDataTest extends WebTestCase
{
    public function testAtLeastOneBookExistsInDatabase(): void
    {
        self::bootKernel();
        
        $bookRepository = static::getContainer()->get(BookRepository::class);
        $books = $bookRepository->findAll();
        
        $this->assertNotEmpty($books, 'Au moins un livre doit être présent en base après chargement des fixtures.');
    }

    public function testAtLeastOneAuthorExistsInDatabase(): void
    {
        self::bootKernel();
        
        $authorRepository = static::getContainer()->get(AuthorRepository::class);
        $authors = $authorRepository->findAll();
        
        $this->assertNotEmpty($authors, 'Au moins un auteur doit être présent en base après chargement des fixtures.');
    }

    public function testAtLeastOneEditorExistsInDatabase(): void
    {
        self::bootKernel();
        
        $editorRepository = static::getContainer()->get(EditorRepository::class);
        $editors = $editorRepository->findAll();
        
        $this->assertNotEmpty($editors, 'Au moins un éditeur doit être présent en base après chargement des fixtures.');
    }
}