<?php
declare(strict_types=1);

namespace App\Controllers;

/**
 * Contrôleur de la page Portfolio
 * 
 * Gère l'affichage du portfolio de projets avec filtres par catégorie.
 * 
 * @package App\Controllers
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class PortfolioController
{
    /**
     * Affiche la page Portfolio
     * 
     * @return string Contenu HTML de la page Portfolio
     */
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Portfolio - Edem Claude KUMAZA',
            'cssFiles' => ['style.css', 'pages/portfolio.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js']
        ];
        
        return $this->render('portfolio', $data);
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
