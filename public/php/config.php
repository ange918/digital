<?php
/**
 * Configuration de la base de données
 * JRC DIGIT - Agence Digitale
 * 
 * Ce fichier contient la configuration pour la connexion à la base de données.
 * À activer lorsque la base de données sera configurée.
 */

// Mode développement
define('DEV_MODE', true);

// Configuration de la base de données (à remplir)
define('DB_HOST', 'localhost');
define('DB_NAME', 'jrcdigit_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Configuration email (à remplir)
define('SMTP_HOST', '');
define('SMTP_PORT', 587);
define('SMTP_USER', '');
define('SMTP_PASS', '');
define('FROM_EMAIL', 'contact@jrcdigit.com');
define('FROM_NAME', 'JRC DIGIT');

// Configuration WhatsApp (à remplir)
define('WHATSAPP_NUMBER', '+22900000000');

// Chemin des uploads
define('UPLOAD_DIR', __DIR__ . '/uploads/');

// Taille max des fichiers (5MB)
define('MAX_FILE_SIZE', 5 * 1024 * 1024);

// Types de fichiers autorisés
define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'application/pdf', 'audio/mpeg', 'audio/mp3']);
