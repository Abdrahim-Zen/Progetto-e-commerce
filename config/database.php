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
        $sql = "SELECT * FROM manga WHERE categoria = ? ORDER BY id DESC LIMIT ?";
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

    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
