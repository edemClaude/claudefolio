<?php
declare(strict_types=1);

namespace App\Controllers;

/**
 * Contrôleur de la page À propos
 * 
 * Gère l'affichage de la page de présentation personnelle
 * avec parcours, valeurs et compétences.
 * 
 * @package App\Controllers
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class AboutController
{
    /**
     * Affiche la page À propos
     * 
     * @return string Contenu HTML de la page À propos
     */
    public function index(): string
    {
        $data = [
            'pageTitle' => 'À propos - Edem Claude KUMAZA',
            'cssFiles' => ['style.css', 'pages/about.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js']
        ];
        
        return $this->render('about', $data);
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
