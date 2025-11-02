<?php
class Database
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "manga";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Connessione fallita: " . $this->conn->connect_error);
        }
    }

    public function getProductsByCategory($category, $limit = 8)
    {
        $sql = "SELECT m.* , p.* , i.image FROM manga m INNER JOIN prodotti p ON m.id_manga = p.ID INNER JOIN immagine_prodotti i ON p.ID = i.prodotto_id WHERE m.stato = ? LIMIT ?";

        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Errore preparazione statement: " . $this->conn->error);
        }

        $stmt->bind_param("si", $category, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        $stmt->close();
        return $products;
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM manga m join immagine_prodotti i on m.id_manga=i.prodotto_id join prodotti p on m.id_manga=p.ID WHERE id_manga = ?";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Errore preparazione statement: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $product = null;
        if ($result && $result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }

        $stmt->close();
        return $product;
    }

        // NUOVI METODI PER UTENTI
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM utente WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $user = null;
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        }
        
        $stmt->close();
        return $user;
    }

    public function createUser($nome, $cognome, $email, $password)
    {
        $sql = "INSERT INTO utente (nome, cognome, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $cognome, $email, $password);
        $success = $stmt->execute();
        $stmt->close();
        
        return $success;
    }


    // Nel file Database.php, aggiungi questi metodi:

public function addToCart($user_id, $product_id, $quantity = 1)
{
    // Controlla se il prodotto è già nel carrello
    $check_sql = "SELECT * FROM carrello WHERE utente_id = ? AND prodotto_id = ?";
    $stmt = $this->conn->prepare($check_sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Aggiorna la quantità
        $update_sql = "UPDATE carrello SET quantita = quantita + ? WHERE utente_id = ? AND prodotto_id = ?";
        $stmt = $this->conn->prepare($update_sql);
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
        return $stmt->execute();
    } else {
        // Inserisce nuovo prodotto
        $insert_sql = "INSERT INTO carrello (utente_id, prodotto_id, quantita) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($insert_sql);
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);
        return $stmt->execute();
    }
}

public function getCartItems($user_id)
{
    $sql = "SELECT c.*, 
                   p.prezzo, 
                   p.codice, 
                   p.descrizione,
                   i.image,
                   COALESCE(m.nome, f.nome_personaggio, cg.brand_carta) as nome,
                   CASE 
                       WHEN m.id_manga IS NOT NULL THEN 'manga'
                       WHEN f.id_figure IS NOT NULL THEN 'figure' 
                       WHEN cg.id_carta IS NOT NULL THEN 'carte'
                   END as tipo_prodotto
            FROM carrello c 
            JOIN prodotti p ON c.prodotto_id = p.ID 
            LEFT JOIN manga m ON p.ID = m.id_manga 
            LEFT JOIN figure f ON p.ID = f.id_figure
            LEFT JOIN carte cg ON p.ID = cg.id_carta
            LEFT JOIN immagine_prodotti i ON p.ID = i.prodotto_id 
            WHERE c.utente_id = ?";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    
    return $items;
}

public function getCartCount($user_id)
{
    $sql = "SELECT SUM(quantita) as total FROM carrello WHERE utente_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    return $row['total'] ?? 0;
}

public function removeFromCart($user_id, $product_id)
{
    $sql = "DELETE FROM carrello WHERE utente_id = ? AND prodotto_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    return $stmt->execute();
}

public function updateCartQuantity($user_id, $product_id, $quantity)
{
    if ($quantity <= 0) {
        return $this->removeFromCart($user_id, $product_id);
    }
    
    $sql = "UPDATE carrello SET quantita = ? WHERE utente_id = ? AND prodotto_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("iii", $quantity, $user_id, $product_id);
    return $stmt->execute();
}

    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
