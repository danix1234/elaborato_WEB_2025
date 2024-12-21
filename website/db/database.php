<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname);

        if ($temp = $this->db->connect_error) {
            die("Connection failed: " . $temp);
        }
    }
    public function isAdmin($email): bool
    {
        $stmt = $this->db->prepare(
            "SELECT privilegi
                    FROM Utente
                    WHERE email = ?;"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_column(0);
    }


}
?>