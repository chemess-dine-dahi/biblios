<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Editor;
use App\Enum\BookStatus;

class BookTest extends TestCase
{
    public function testDefaultStatus()
    {
        $book = new Book();
        $this->assertNull($book->getStatus(), 'Le statut par défaut doit être null');
    }

    public function testSetTitle()
    {
        $book = new Book();
        $book->setTitle('Mon Livre');
        $this->assertEquals('Mon Livre', $book->getTitle());
    }

    public function testSetEditor()
    {
        $book = new Book();
        $editor = new Editor();
        $editor->setName('Gallimard');
        $book->setEditor($editor);
        $this->assertSame($editor, $book->getEditor());
    }

    public function testAddAuthor()
    {
        $book = new Book();
        $author = new Author();
        $author->setName('Victor Hugo');
        $book->addAuthor($author);
        $this->assertTrue($book->getAuthors()->contains($author));
    }

    public function testSetStatus()
    {
        $book = new Book();
        $book->setStatus(BookStatus::Available);
        $this->assertEquals(BookStatus::Available, $book->getStatus());
    }
}
