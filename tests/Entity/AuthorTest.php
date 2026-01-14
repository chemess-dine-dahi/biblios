<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Author;

class AuthorTest extends TestCase
{
    public function testDefaultName()
    {
        $author = new Author();
        $this->assertNull($author->getName(), 'Le nom par défaut doit être null');
    }

    public function testSetName()
    {
        $author = new Author();
        $author->setName('Jules Verne');
        $this->assertEquals('Jules Verne', $author->getName());
    }
}
