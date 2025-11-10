<?php
declare(strict_types=1);

namespace App\Controllers;

/**
 * Contrôleur de la page de contact
 * 
 * Gère l'affichage du formulaire de contact et le traitement
 * des soumissions avec validation des données.
 * 
 * @package App\Controllers
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class ContactController
{
    /**
     * Affiche le formulaire de contact
     * 
     * @return string Contenu HTML de la page de contact
     */
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Contact - Edem Claude KUMAZA',
            'cssFiles' => ['style.css', 'pages/contact.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js', 'contact.js']
        ];
        
        return $this->render('contact', $data);
    }
    
    /**
     * Traite la soumission du formulaire de contact
     * 
     * Valide les données et retourne une réponse JSON.
     * TODO: Implémenter l'envoi d'email ou sauvegarde en base de données
     * 
     * @return string Réponse JSON avec succès ou erreurs
     */
    public function submit(): string
    {
        // Récupérer les données du formulaire
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';
        
        // Validation basique
        $errors = [];
        
        if (empty($name)) {
            $errors[] = 'Le nom est requis';
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        }
        
        if (empty($message)) {
            $errors[] = 'Le message est requis';
        }
        
        if (empty($errors)) {
            // TODO: Envoyer l'email ou sauvegarder en base de données
            // Pour l'instant, on simule un succès
            
            return json_encode([
                'success' => true,
                'message' => 'Merci pour votre message ! Je vous répondrai dans les plus brefs délais.'
            ]);
        }
        
        return json_encode([
            'success' => false,
            'errors' => $errors
        ]);
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
