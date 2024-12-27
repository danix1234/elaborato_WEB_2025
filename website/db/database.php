<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

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
    private function parametrizedNoresultQuery($query, $types, &$var1, &...$vars)
    {
        $stmt = $this->db->prepare($query);
        $stmt->bind_param($types, $var1, ...$vars);
        $ok = $stmt->execute();
        $rows = $stmt->affected_rows;
        return array($ok, $rows);
    }

    public function getAllCartItems($userId)
    {
        $query = "SELECT *
                    FROM CARRELLO C, PRODOTTO P
                    WHERE C.codProdotto = P.codProdotto 
                        AND C.codUtente = ?";
        return $this->parametrizedQuery($query, "i", $userId);
    }
    public function deleteFromCart($userId, $productId)
    {
        $query = "DELETE FROM CARRELLO
                    WHERE codUtente = ? AND codProdotto = ?;";
        return $this->parametrizedNoresultQuery($query, "ii", $userId, $productId);
    }
    public function updateCartQuantity($userId, $productId, $newQuantity)
    {
        $query = "UPDATE CARRELLO
                    SET quantita = ? 
                    WHERE codUtente = ? AND codProdotto = ?;";
        return $this->parametrizedNoresultQuery($query, "iii", $newQuantity, $userId, $productId);
    }
    public function getProduct($productId)
    {
        $query = "SELECT *
                    FROM PRODOTTO
                    WHERE codProdotto = ?;";
        return $this->parametrizedQuery($query, "i", $productId);
    }
    public function getAllCategories()
    {
        $query = "SELECT *
                    FROM CATEGORIA";
        return $this->simpleQuery($query);
    }
    public function addProduct($name, $desc, $quantity, $price, $img, $cat)
    {
        $query = 'INSERT INTO PRODOTTO(nome, descrizione, quantitaResidua, prezzo, immagine, codCategoria)
                    VALUES(?,?,?,?,?,?)';
        return $this->parametrizedNoresultQuery($query, "ssidsi", $name, $desc, $quantity, $price, $img, $cat);
    }
    public function updateProduct($productId, $name, $desc, $quantity, $price, $cat)
    {
        $query = 'UPDATE PRODOTTO
                    SET nome = ?, descrizione = ?, quantitaResidua = ?, prezzo = ?, codCategoria = ?
                    WHERE codProdotto = ?';
        return $this->parametrizedNoresultQuery($query, "ssidii", $name, $desc, $quantity, $price, $cat, $productId);
    }
    public function updateProductImg($productId, $img)
    {
        $query = 'UPDATE PRODOTTO
                    SET immagine = ?
                    WHERE codProdotto = ?';
        return $this->parametrizedNoresultQuery($query, "si", $img, $productId);
    }
    public function getOrder($orderId, $userId)
    {
        $query = 'SELECT *
                    FROM ORDINE O, DETTAGLIO_ORDINE D, PRODOTTO P, UTENTE U
                    WHERE O.codOrdine = D.codOrdine AND P.codProdotto = D.codProdotto AND U.codUtente = O.codUtente
                        AND O.codOrdine = ? AND U.codUtente = ?;';
        return $this->parametrizedQuery($query, "ii", $orderId, $userId);
    }

    public function getUser($username)
    {
        $query = "SELECT *
                    FROM UTENTE
                    WHERE nomeUtente = ?;";
        return $this->parametrizedQuery($query, "s", $username);
    }

    public function updateUser($username, $password, $email, $privileges, $address, $city)
    {
        $query = 'UPDATE UTENTE
                    SET password = ?, email = ?, privilegi = ?, indirizzo = ?, citta = ?
                    WHERE nomeUtente = ?';
        return $this->parametrizedNoresultQuery($query, "ssssss", $password, $email, $privileges, $address, $city, $username);
    }

    public function deleteUser($username)
    {
        $query = 'DELETE FROM UTENTE
                    WHERE nomeUtente = ?';
        return $this->parametrizedNoresultQuery($query, "s", $username);
    }
    /**
     * check if the email and password match in the database
     */
    public function checkLogin($email, $password)
    {
        $query = "SELECT nomeUtente, email, codUtente, privilegi
                    FROM UTENTE 
                    WHERE email = ?
                    AND password = ?";
        return $this->parametrizedQuery($query, "ss", $email, $password);
    }
    /**
     * get user by email
     */
    public function getUserbyEmail($email)
    {
        $query = "SELECT *
                    FROM UTENTE
                    WHERE email = ?";
        return $this->parametrizedQuery($query, "s", $email);
    }

    public function addUserr($name, $email, $password, $address, $city){
        $query = "INSERT INTO UTENTE(nomeUtente, email, password, privilegi, indirizzo, citta)
                    VALUES(?,?,?,0,?,?)";
        return $this->parametrizedNoresultQuery($query, "sssss", $name, $email, $password, $address, $city);
    }
}
