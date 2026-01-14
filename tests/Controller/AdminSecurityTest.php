<?php
namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminSecurityTest extends WebTestCase
{
    /**
     * Test: accès à /admin/author sans être connecté -> redirection vers /login
     */
    public function testAdminAuthorPageRedirectsToLoginWhenNotAuthenticated(): void
    {
        $client = static::createClient();
        $client->followRedirects(false);
        
        $crawler = $client->request('GET', '/admin/author');

        $response = $client->getResponse();
        $statusCode = $response->getStatusCode();

        $this->assertEquals(302, $statusCode, "L'accès à /admin/author sans authentification doit retourner 302. Code reçu: $statusCode");
        $this->assertResponseRedirects('/login', null, "La redirection doit pointer vers /login");
    }

    /**
     * Test: accès à /admin/author pour un admin connecté
     */
    public function testAdminAuthorPageIsAccessibleForAdmin(): void
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);
        $adminUser = $userRepository->findOneBy(['email' => 'nbertin@noos.fr']);
        if (!$adminUser) {
            $this->markTestSkipped('Aucun utilisateur admin (nbertin@noos.fr) trouvé en base.');
        }
        $this->assertContains('ROLE_ADMIN', $adminUser->getRoles(), "L'utilisateur doit avoir le rôle ROLE_ADMIN");
        $client->loginUser($adminUser);
        $client->request('GET', '/admin/author');
        $this->assertResponseStatusCodeSame(200, "L'admin doit avoir accès à /admin/author");
    }
}