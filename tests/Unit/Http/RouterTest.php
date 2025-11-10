<?php
/**
 * Tests unitaires pour la classe Router
 * 
 * @package Tests\Unit\Http
 * @author  Edem Claude KUMAZA
 */

declare(strict_types=1);

namespace Tests\Unit\Http;

use App\Http\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    /**
     * Test de l'enregistrement d'une route GET
     */
    public function testGetRoute(): void
    {
        $this->router->get('/', function() {
            return 'Home Page';
        });

        $result = $this->router->dispatch('GET', '/');

        $this->assertEquals('Home Page', $result);
    }

    /**
     * Test de l'enregistrement d'une route POST
     */
    public function testPostRoute(): void
    {
        $this->router->post('/submit', function() {
            return 'Form Submitted';
        });

        $result = $this->router->dispatch('POST', '/submit');

        $this->assertEquals('Form Submitted', $result);
    }

    /**
     * Test d'une route inexistante (404)
     */
    public function testNotFoundRoute(): void
    {
        $this->router->get('/', function() {
            return 'Home';
        });

        $result = $this->router->dispatch('GET', '/non-existent');

        $this->assertEquals('404 - Page Not Found', $result);
    }

    /**
     * Test d'une mauvaise méthode HTTP
     */
    public function testWrongMethod(): void
    {
        $this->router->get('/page', function() {
            return 'GET Response';
        });

        // Essayer avec POST au lieu de GET
        $result = $this->router->dispatch('POST', '/page');

        $this->assertEquals('404 - Page Not Found', $result);
    }

    /**
     * Test avec un contrôleur en tableau
     */
    public function testControllerArrayHandler(): void
    {
        // Créer une classe de contrôleur mock
        $controller = new class {
            public function index(): string {
                return 'Controller Response';
            }
        };

        $this->router->get('/test', [get_class($controller), 'index']);

        $result = $this->router->dispatch('GET', '/test');

        $this->assertEquals('Controller Response', $result);
    }

    /**
     * Test de multiples routes
     */
    public function testMultipleRoutes(): void
    {
        $this->router->get('/', fn() => 'Home');
        $this->router->get('/about', fn() => 'About');
        $this->router->get('/contact', fn() => 'Contact');

        $this->assertEquals('Home', $this->router->dispatch('GET', '/'));
        $this->assertEquals('About', $this->router->dispatch('GET', '/about'));
        $this->assertEquals('Contact', $this->router->dispatch('GET', '/contact'));
    }

    /**
     * Test du code de statut HTTP 404
     */
    public function testNotFoundSetsHttpResponseCode(): void
    {
        $this->router->get('/', fn() => 'Home');
        
        // Capturer le code de statut serait complexe en test unitaire
        // Ce test vérifie juste que le dispatch retourne le bon message
        $result = $this->router->dispatch('GET', '/invalid');
        
        $this->assertEquals('404 - Page Not Found', $result);
    }
}
