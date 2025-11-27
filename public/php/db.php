<?php
/**
 * Connexion à la base de données
 * JRC DIGIT - Agence Digitale
 * 
 * Ce fichier gère la connexion PDO à la base de données.
 * À activer lorsque la base de données sera configurée.
 */

require_once 'config.php';

class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        if (!DEV_MODE) {
            try {
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                error_log("Erreur de connexion à la base de données: " . $e->getMessage());
                throw new Exception("Erreur de connexion à la base de données");
            }
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->pdo;
    }
    
    public function query($sql, $params = []) {
        if (DEV_MODE) {
            return null;
        }
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    public function insert($table, $data) {
        if (DEV_MODE) {
            return true;
        }
        
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        return $this->query($sql, $data);
    }
    
    public function lastInsertId() {
        if (DEV_MODE) {
            return rand(1, 1000);
        }
        return $this->pdo->lastInsertId();
    }
}

/**
 * Structure de la table orders (à créer dans MySQL)
 * 
 * CREATE TABLE orders (
 *     id INT AUTO_INCREMENT PRIMARY KEY,
 *     service VARCHAR(50) NOT NULL,
 *     nom VARCHAR(100) NOT NULL,
 *     email VARCHAR(150) NOT NULL,
 *     whatsapp VARCHAR(20),
 *     description TEXT,
 *     budget VARCHAR(50),
 *     fichiers TEXT,
 *     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 *     status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending'
 * );
 */
