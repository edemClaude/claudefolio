<?php
declare(strict_types=1);

namespace App\Controllers;

/**
 * Contrôleur de la page Services
 * 
 * Gère l'affichage des services proposés et du processus de travail.
 * 
 * @package App\Controllers
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class ServicesController
{
    /**
     * Affiche la page Services
     * 
     * @return string Contenu HTML de la page Services
     */
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Services - Edem Claude KUMAZA',
            'cssFiles' => ['style.css', 'pages/services.css', 'process.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js']
        ];
        
        return $this->render('services', $data);
    }

    /**
     * Rend un template avec les données fournies
     * 
     * @param string $template Nom du fichier template (sans extension)
     * @param array<string, mixed> $data Données à passer au template
     * @return string Contenu HTML généré
     */
    private function render(string $template, array $data = []): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../templates/' . $template . '.php';
        return ob_get_clean();
    }
}
