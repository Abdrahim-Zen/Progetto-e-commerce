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

    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
