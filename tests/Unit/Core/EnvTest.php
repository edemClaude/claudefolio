<?php
/**
 * Tests unitaires pour la classe Env
 * 
 * @package Tests\Unit\Core
 * @author  Edem Claude KUMAZA
 */

declare(strict_types=1);

namespace Tests\Unit\Core;

use App\Core\Env;
use PHPUnit\Framework\TestCase;

class EnvTest extends TestCase
{
    private string $testEnvFile;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Créer un fichier .env de test temporaire
        $this->testEnvFile = sys_get_temp_dir() . '/.env.test';
        
        $content = <<<ENV
# Test environment file
APP_NAME=Portfolio Test
APP_DEBUG=true
DB_HOST=localhost
DB_PORT=3306

# Commentaire à ignorer
EMPTY_VALUE=
QUOTED_VALUE="test value"
ENV;
        
        file_put_contents($this->testEnvFile, $content);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        
        // Nettoyer le fichier de test
        if (file_exists($this->testEnvFile)) {
            unlink($this->testEnvFile);
        }
    }

    /**
     * Test du chargement d'un fichier .env
     */
    public function testLoadEnvFile(): void
    {
        Env::load($this->testEnvFile);
        
        $this->assertEquals('Portfolio Test', Env::get('APP_NAME'));
        $this->assertEquals('true', Env::get('APP_DEBUG'));
        $this->assertEquals('localhost', Env::get('DB_HOST'));
        $this->assertEquals('3306', Env::get('DB_PORT'));
    }

    /**
     * Test de la récupération d'une variable avec valeur par défaut
     */
    public function testGetWithDefault(): void
    {
        Env::load($this->testEnvFile);
        
        $result = Env::get('NON_EXISTENT_VAR', 'default_value');
        
        $this->assertEquals('default_value', $result);
    }

    /**
     * Test de la gestion des valeurs entre guillemets
     */
    public function testQuotedValues(): void
    {
        Env::load($this->testEnvFile);
        
        $result = Env::get('QUOTED_VALUE');
        
        // Les guillemets doivent être retirés
        $this->assertEquals('test value', $result);
    }

    /**
     * Test du comportement avec un fichier inexistant
     */
    public function testLoadNonExistentFile(): void
    {
        // Ne devrait pas lever d'exception
        Env::load('/path/to/non/existent/file.env');
        
        $this->assertTrue(true); // Test passe si aucune exception
    }

    /**
     * Test de la valeur par défaut null
     */
    public function testGetWithNullDefault(): void
    {
        $result = Env::get('DEFINITELY_NOT_SET');
        
        $this->assertNull($result);
    }
}
