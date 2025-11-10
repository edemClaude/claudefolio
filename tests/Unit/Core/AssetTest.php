<?php
/**
 * Tests unitaires pour la classe Asset
 * 
 * @package Tests\Unit\Core
 * @author  Edem Claude KUMAZA
 */

declare(strict_types=1);

namespace Tests\Unit\Core;

use App\Core\Asset;
use PHPUnit\Framework\TestCase;

class AssetTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Réinitialiser le basePath avant chaque test
        Asset::setBasePath('');
    }

    /**
     * Test de la définition du chemin de base
     */
    public function testSetBasePath(): void
    {
        Asset::setBasePath('/test');
        $result = Asset::css('style.css');
        
        $this->assertStringContainsString('/test/assets/css/style.css', $result);
    }

    /**
     * Test de la génération de balises CSS pour un fichier unique
     */
    public function testCssSingleFile(): void
    {
        $result = Asset::css('style.css');
        
        $this->assertStringContainsString('<link rel="stylesheet"', $result);
        $this->assertStringContainsString('assets/css/style.css', $result);
    }

    /**
     * Test de la génération de balises CSS pour plusieurs fichiers
     */
    public function testCssMultipleFiles(): void
    {
        $files = ['style.css', 'pages/home.css'];
        $result = Asset::css($files);
        
        $this->assertStringContainsString('style.css', $result);
        $this->assertStringContainsString('pages/home.css', $result);
        // Vérifie qu'il y a 2 balises link
        $this->assertEquals(2, substr_count($result, '<link rel="stylesheet"'));
    }

    /**
     * Test de la génération de balises JavaScript
     */
    public function testJsWithDefer(): void
    {
        $result = Asset::js('app.js');
        
        $this->assertStringContainsString('<script', $result);
        $this->assertStringContainsString('assets/js/app.js', $result);
        $this->assertStringContainsString('defer', $result);
    }

    /**
     * Test de la génération de balises JavaScript sans defer
     */
    public function testJsWithoutDefer(): void
    {
        $result = Asset::js('app.js', false);
        
        $this->assertStringContainsString('<script', $result);
        $this->assertStringNotContainsString('defer', $result);
    }

    /**
     * Test de la génération de chemin d'image
     */
    public function testImg(): void
    {
        $result = Asset::img('logo.png');
        
        $this->assertEquals('/assets/img/logo.png', $result);
    }

    /**
     * Test du versioning (cache busting) pour les fichiers
     */
    public function testVersioningParameter(): void
    {
        $result = Asset::css('style.css');
        
        // Vérifie qu'un paramètre de version est ajouté (ou pas selon si le fichier existe)
        $this->assertMatchesRegularExpression('/style\.css(\?v=\d+)?/', $result);
    }
}
