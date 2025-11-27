<?php
/**
 * Traitement des formulaires de commande
 * JRC DIGIT - Agence Digitale
 * 
 * Ce fichier reçoit et traite les soumissions de formulaires.
 * En mode dev, il simule le succès sans connexion DB.
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'config.php';
require_once 'db.php';

// Vérifier la méthode
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

try {
    // Récupérer les données
    $data = [
        'service' => sanitize($_POST['service'] ?? 'contact'),
        'nom' => sanitize($_POST['nom'] ?? ''),
        'email' => sanitize($_POST['email'] ?? ''),
        'whatsapp' => sanitize($_POST['whatsapp'] ?? ''),
        'description' => sanitize($_POST['description'] ?? $_POST['message'] ?? ''),
        'budget' => sanitize($_POST['budget'] ?? ''),
        'type_site' => sanitize($_POST['type_site'] ?? ''),
        'type_design' => sanitize($_POST['type_design'] ?? ''),
        'pack' => sanitize($_POST['pack'] ?? ''),
        'style' => sanitize($_POST['style'] ?? ''),
        'sujet' => sanitize($_POST['sujet'] ?? ''),
    ];
    
    // Validation basique
    if (empty($data['nom']) || empty($data['email'])) {
        throw new Exception('Nom et email sont requis');
    }
    
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Email invalide');
    }
    
    // Gérer les fichiers uploadés
    $uploadedFiles = [];
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                // En mode dev, on simule juste
                if (DEV_MODE) {
                    $uploadedFiles[] = $file['name'];
                } else {
                    // Vérifier le type
                    if (!in_array($file['type'], ALLOWED_TYPES)) {
                        continue;
                    }
                    
                    // Vérifier la taille
                    if ($file['size'] > MAX_FILE_SIZE) {
                        continue;
                    }
                    
                    // Créer le dossier si nécessaire
                    if (!is_dir(UPLOAD_DIR)) {
                        mkdir(UPLOAD_DIR, 0755, true);
                    }
                    
                    // Générer un nom unique
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $filename = uniqid() . '_' . time() . '.' . $ext;
                    $destination = UPLOAD_DIR . $filename;
                    
                    if (move_uploaded_file($file['tmp_name'], $destination)) {
                        $uploadedFiles[] = $filename;
                    }
                }
            }
        }
    }
    
    $data['fichiers'] = implode(',', $uploadedFiles);
    
    // Enregistrer en base (ou simuler en mode dev)
    if (DEV_MODE) {
        // Mode développement - simuler le succès
        $orderId = rand(1000, 9999);
        
        // Log pour debug
        error_log("Nouvelle commande reçue (DEV MODE):");
        error_log(print_r($data, true));
        
    } else {
        // Mode production - enregistrer en DB
        $db = Database::getInstance();
        $db->insert('orders', $data);
        $orderId = $db->lastInsertId();
        
        // Envoyer notification par email (à implémenter)
        // sendNotificationEmail($data, $orderId);
    }
    
    // Réponse succès
    echo json_encode([
        'success' => true,
        'message' => 'Votre demande a été enregistrée avec succès !',
        'order_id' => $orderId
    ]);
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

/**
 * Nettoyer les entrées utilisateur
 */
function sanitize($input) {
    if (is_array($input)) {
        return array_map('sanitize', $input);
    }
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

/**
 * Envoyer une notification par email (à implémenter)
 */
function sendNotificationEmail($data, $orderId) {
    // TODO: Implémenter l'envoi d'email avec PHPMailer ou similaire
    // Pour les commandes musique, envoyer un email de confirmation
    // avec le message "Vous recevrez votre musique personnalisée demain par mail."
}
