<?php
declare(strict_types=1);

namespace App\Controllers;

/**
 * Contrôleur de la page d'accueil
 * 
 * Gère l'affichage de la page d'accueil du portfolio
 * avec présentation, compétences et informations de contact.
 * 
 * @package App\Controllers
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class HomeController
{
    /**
     * Affiche la page d'accueil
     * 
     * @return string Contenu HTML de la page d'accueil
     */
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Edem Claude KUMAZA - Web Developer',
            'cssFiles' => ['style.css', 'pages/home.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js']
        ];
        
        return $this->render('home', $data);
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
