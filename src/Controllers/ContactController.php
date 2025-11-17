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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrfToken;

        $data = [
            'pageTitle' => 'Contact - Edem Claude KUMAZA',
            'cssFiles' => ['style.css', 'pages/contact.css', 'animations.css'],
            'jsFiles' => ['animations.js', 'app.js', 'contact.js'],
            'csrfToken' => $csrfToken,
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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $errors = [];

        $token = $_POST['_csrf_token'] ?? '';
        if (empty($token) || !isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
            $errors[] = 'Session expirée ou token CSRF invalide. Veuillez recharger la page.';

            return json_encode([
                'success' => false,
                'errors' => $errors,
            ]);
        }

        // Récupérer les données du formulaire
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';
        
        // Validation basique
        
        if (empty($name)) {
            $errors[] = 'Le nom est requis';
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalide';
        }
        
        if (empty($message)) {
            $errors[] = 'Le message est requis';
        }
        
        if (!empty($errors)) {
            return json_encode([
                'success' => false,
                'errors' => $errors,
            ]);
        }

        $config = require __DIR__ . '/../../config/app.php';
        $to = $config['contact_email'] ?? ($config['contact']['to'] ?? null);

        if (!$to) {
            return json_encode([
                'success' => false,
                'errors' => ['Configuration email manquante.'],
            ]);
        }

        $safeName = trim($name);
        $safeEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        $safeSubject = trim($subject) !== '' ? trim($subject) : 'Nouveau message depuis le formulaire de contact';
        $safeMessage = trim($message);

        // En environnement de tests, on ne tente pas d'envoyer de vrai email
        if (($config['env'] ?? null) !== 'testing') {
            $emailSubject = '[Contact Portfolio] ' . $safeSubject;
            $body = "Nom : {$safeName}\n" .
                "Email : {$safeEmail}\n\n" .
                "Message :\n{$safeMessage}\n";

            $headers = [];
            $headers[] = 'From: ' . $safeName . " <{$safeEmail}>";
            $headers[] = 'Reply-To: ' . $safeEmail;
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';

            $mailSent = @mail($to, $emailSubject, $body, implode("\r\n", $headers));

            if (!$mailSent) {
                return json_encode([
                    'success' => false,
                    'errors' => ["Impossible d'envoyer le message pour le moment. Veuillez réessayer plus tard."],
                ]);
            }
        }

        unset($_SESSION['csrf_token']);

        return json_encode([
            'success' => true,
            'message' => 'Merci pour votre message ! Je vous répondrai dans les plus brefs délais.',
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
