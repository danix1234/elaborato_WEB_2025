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
    private function simpleQuery($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    private function parametrizedQuery($query, $types, &$var1, &...$vars)
    {
        $stmt = $this->db->prepare($query);
        $stmt->bind_param($types, $var1, ...$vars);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function isAdmin($email)
    {
        $query = "SELECT privilegi
                    FROM UTENTE
                    WHERE email = ? AND privilegi;";
        return sizeof($this->parametrizedQuery($query, "s", $email)) > 0;
    }
    public function getAllCartItems($email)
    {
        $query = "SELECT *
                    FROM CARRELLO C, PRODOTTO P, UTENTE U
                    WHERE C.codProdotto = P.codProdotto AND U.codUtente = C.codUtente
                        AND U.email = ?;";
        return $this->parametrizedQuery($query, "s", $email);
    }
}
