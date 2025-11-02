<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

class LoginController
{
    private $templates;
    private $db;

    public function __construct()
    {
        // Inizializza Plates
        $this->templates = new League\Plates\Engine(__DIR__ . '/../templates');
        
        // Connessione al database
        $this->db = new Database();
    }

    // Mostra login
    public function showLogin()
    {
        $message = $_GET['message'] ?? '';
        // Passa i dati come array associativo
        $data = [
            'title' => 'Login - Manga Xeno',
            'message' => $message
        ];
        echo $this->templates->render('login', $data);
    }

    // Gestisce login
    public function handleLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->db->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_name'] = $user['nome'];
            header('Location: index.php');
        } else {
            header('Location: auth.php?action=showLogin&message=Login+fallito');
        }
    }

    // Mostra registrazione
    public function showRegister()
    {
        $message = $_GET['message'] ?? '';
        $data = [
            'title' => 'Registrazione - Manga Xeno',
            'message' => $message
        ];
        echo $this->templates->render('register', $data);
    }

    // Gestisce registrazione
    public function handleRegister()
    {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Controlla se email esiste
        if ($this->db->getUserByEmail($email)) {
            header('Location: auth.php?action=showRegister&message=Email+gia+registrata');
            return;
        }

        // Crea utente
        $this->db->createUser($nome, $cognome, $email, $password);
        header('Location: auth.php?action=showLogin&message=Registrazione+completata');
    }

    // Logout
    public function handleLogout()
    {
        session_destroy();
        header('Location: index.php');
    }
}