<?php
/**
 * Tests fonctionnels pour les contrôleurs
 * 
 * @package Tests\Feature
 * @author  Edem Claude KUMAZA
 */

declare(strict_types=1);

namespace Tests\Feature;

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ServicesController;
use App\Controllers\PortfolioController;
use App\Controllers\ContactController;
use PHPUnit\Framework\TestCase;

class ControllersTest extends TestCase
{
    /**
     * Test que le HomeController retourne du contenu HTML
     */
    public function testHomeControllerReturnsHtml(): void
    {
        $controller = new HomeController();
        $result = $controller->index();

        $this->assertIsString($result);
        $this->assertStringContainsString('<!DOCTYPE html>', $result);
        $this->assertStringContainsString('Edem Claude KUMAZA', $result);
    }

    /**
     * Test que le AboutController retourne du contenu HTML
     */
    public function testAboutControllerReturnsHtml(): void
    {
        $controller = new AboutController();
        $result = $controller->index();

        $this->assertIsString($result);
        $this->assertStringContainsString('<!DOCTYPE html>', $result);
    }

    /**
     * Test que le ServicesController retourne du contenu HTML
     */
    public function testServicesControllerReturnsHtml(): void
    {
        $controller = new ServicesController();
        $result = $controller->index();

        $this->assertIsString($result);
        $this->assertStringContainsString('<!DOCTYPE html>', $result);
    }

    /**
     * Test que le PortfolioController retourne du contenu HTML
     */
    public function testPortfolioControllerReturnsHtml(): void
    {
        $controller = new PortfolioController();
        $result = $controller->index();

        $this->assertIsString($result);
        $this->assertStringContainsString('<!DOCTYPE html>', $result);
    }

    /**
     * Test que le ContactController retourne du contenu HTML
     */
    public function testContactControllerReturnsHtml(): void
    {
        $controller = new ContactController();
        $result = $controller->index();

        $this->assertIsString($result);
        $this->assertStringContainsString('<!DOCTYPE html>', $result);
    }

    /**
     * Test de la validation du formulaire de contact
     */
    public function testContactSubmitValidation(): void
    {
        $controller = new ContactController();
        
        // Test avec des données vides
        $_POST = [];
        $result = $controller->submit();
        $data = json_decode($result, true);

        $this->assertFalse($data['success']);
        $this->assertNotEmpty($data['errors']);
    }

    /**
     * Test du formulaire de contact avec des données valides
     */
    public function testContactSubmitSuccess(): void
    {
        $controller = new ContactController();
        
        // Simuler des données POST valides
        $_POST = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'Test message content'
        ];
        
        $result = $controller->submit();
        $data = json_decode($result, true);

        $this->assertTrue($data['success']);
        $this->assertArrayHasKey('message', $data);
    }

    /**
     * Test de validation email invalide
     */
    public function testContactSubmitInvalidEmail(): void
    {
        $controller = new ContactController();
        
        $_POST = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'subject' => 'Test',
            'message' => 'Test message'
        ];
        
        $result = $controller->submit();
        $data = json_decode($result, true);

        $this->assertFalse($data['success']);
        $this->assertContains('Email invalide', $data['errors']);
    }
}
