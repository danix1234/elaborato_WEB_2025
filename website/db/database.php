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
    /**
     * Dynamic query with parameters
     */
    private function dynamicParametrizedQuery($query, $types, $array)
    {
        $stmt = $this->db->prepare($query);
        $bind_names = array($types);
        for ($i = 0; $i < count($array); $i++) {
            $bind_name = "bind" . $i;
            // es. primo ciclio $$bind_name = $bind0 -> $bind0 = $params[0]
            $$bind_name = $array[$i];
            $bind_names[] = &$$bind_name;
        }
        call_user_func_array([$stmt, "bind_param"], $bind_names);
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

    // ↓↓↓ FIRST DANIELE QUERY ↓↓↓
    public function fixAllCartItems($userId)
    {
        $query = "UPDATE CARRELLO C
                    SET quantita = LEAST(GREATEST(quantita, 0), (SELECT quantitaResidua 
                        FROM PRODOTTO P
                        WHERE P.codProdotto = C.codProdotto))
                WHERE codUtente = ?;";
        return $this->parametrizedNoresultQuery($query, "i", $userId);
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
                    WHERE NOT disabilitato AND codProdotto = ?;";
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
                    WHERE codProdotto = ? AND NOT disabilitato';
        return $this->parametrizedNoresultQuery($query, "ssidii", $name, $desc, $quantity, $price, $cat, $productId);
    }
    public function updateProductImg($productId, $img)
    {
        $query = 'UPDATE PRODOTTO
                    SET immagine = ?
                    WHERE codProdotto = ? AND NOT disabilitato';
        return $this->parametrizedNoresultQuery($query, "si", $img, $productId);
    }
    public function disableProduct($productId)
    {
        $query = 'UPDATE PRODOTTO
                    SET disabilitato = true, quantitaResidua = 0
                    WHERE codProdotto = ?';
        return $this->parametrizedNoresultQuery($query, "i", $productId);
    }
    public function isImageUsed($img)
    {
        $query = 'SELECT *
                    FROM PRODOTTO
                    WHERE immagine = ?';
        return $this->parametrizedNoresultQuery($query, "s", $img);
    }
    public function getOrder($orderId, $userId)
    {
        $query = 'SELECT *
                    FROM ORDINE O, DETTAGLIO_ORDINE D, PRODOTTO P
                    WHERE O.codOrdine = D.codOrdine AND P.codProdotto = D.codProdotto
                        AND O.codOrdine = ? AND O.codUtente = ?;';
        return $this->parametrizedQuery($query, "ii", $orderId, $userId);
    }
    public function checkCartInvalidRows($userId)
    {
        $query = 'SELECT *
                    FROM CARRELLO C, PRODOTTO P
                    WHERE C.codProdotto = P.codProdotto AND C.codUtente = ?
                        AND (P.disabilitato OR C.quantita < 0 OR C.quantita > P.quantitaResidua);';
        return $this->parametrizedQuery($query, "i", $userId);
    }
    public function checkCartValidRows($userId)
    {
        $query = 'SELECT *
                    FROM CARRELLO C, PRODOTTO P
                    WHERE C.codProdotto = P.codProdotto AND C.codUtente = ?
                        AND NOT P.disabilitato AND C.quantita > 0 AND C.quantita <= P.quantitaResidua;';
        return $this->parametrizedQuery($query, "i", $userId);
    }
    public function buyCartAddOrder($userId, $orderState, $payed)
    {
        $query = "INSERT INTO ORDINE(dataOrdine, statoOrdine, totale, pagato, codUtente)
                    VALUES(NOW(), ?, (SELECT COALESCE(SUM(quantita*prezzo),0)
                        FROM CARRELLO C, PRODOTTO P
                        WHERE C.codProdotto = P.codProdotto AND C.codUtente = ?),
                    ?, ?);";
        return $this->parametrizedNoResultQuery($query, "siii", $orderState, $userId, $payed, $userId);
    }
    public function buyCartGetLastOrderId()
    {
        $query = "SELECT codOrdine
                    FROM ORDINE            
                    ORDER BY codOrdine desc
                    LIMIT 1;";
        return $this->simpleQuery($query);
    }
    public function buyCartAddOrderDetails($userId, $orderId)
    {
        $query = "INSERT INTO DETTAGLIO_ORDINE(codOrdine, codProdotto, quantita)
                    SELECT ?, codProdotto, quantita
                    FROM CARRELLO
                    WHERE codUtente = ? AND quantita != 0;";
        return $this->parametrizedNoResultQuery($query, "ii", $orderId, $userId);
    }
    public function buyCartDeleteCart($userId)
    {
        $query = "DELETE FROM CARRELLO
                    WHERE codUtente = ?;";
        return $this->parametrizedNoResultQuery($query, "i", $userId);
    }
    // ↑↑↑ LAST DANIELE QUERY ↑↑↑

    // ↓↓↓ FIRST GIUSEPPE QUERY ↓↓↓

    public function getUser($username)
    {
        $query = "SELECT *
                    FROM UTENTE
                    WHERE nomeUtente = ? AND disabilitato = 'false';";
        return $this->parametrizedQuery($query, "s", $username);
    }

    public function updateUser($userId, $password, $email, $privileges, $address, $city)
    {
        $query = 'UPDATE UTENTE
                    SET password = ?, email = ?, privilegi = ?, indirizzo = ?, citta = ?
                    WHERE codUtente = ? AND disabilitato = "false"';
        return $this->parametrizedNoresultQuery($query, "sssssi", $password, $email, $privileges, $address, $city, $userId);
    }


    public function disableUser($userId)
    {
        $query = 'UPDATE UTENTE
                SET disabilitato = "true"
                WHERE codUtente = ?';
        return $this->parametrizedNoresultQuery($query, "i", $userId);
    }

    public function getFilteredNotifications($userId, $notificationState = null)
    {
        $query = "SELECT * 
                FROM NOTIFICHE 
                WHERE codUtente = ?";
        $params = [$userId]; // Parametri della query
        $types = "i"; // Tipo del parametro (intero per userId)

        if ($notificationState !== null) {
            $query .= " AND statoNotifica = ?";
            $params[] = $notificationState;
            $types .= "s"; // Tipo stringa per statoNotifica
        }

        $query .= " ORDER BY dataNotifica DESC";

        return $this->dynamicParametrizedQuery($query, $types, $params);
    }
    // ↑↑↑ LAST GIUSEPPE QUERY ↑↑↑

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
    public function getUserbyEmail($email)
    {
        $query = "SELECT *
                    FROM UTENTE
                    WHERE email = ?";
        return $this->parametrizedQuery($query, "s", $email);
    }
    public function getUserbyUserId($userId)
    {
        $query = "SELECT *
                    FROM UTENTE
                    WHERE codUtente = ?";
        return $this->parametrizedQuery($query, "i", $userId);
    }
    public function addUser($name, $email, $password, $address, $city)
    {
        $query = "INSERT INTO UTENTE(nomeUtente, email, password, privilegi, indirizzo, citta)
                    VALUES(?,?,?,0,?,?)";
        return $this->parametrizedNoresultQuery($query, "sssss", $name, $email, $password, $address, $city);
    }
    // not used
    public function getOrders($userId)
    {
        $query = "SELECT *
                    FROM ORDINE
                    WHERE codUtente = ?
                    ORDER BY dataOrdine DESC";
        return $this->parametrizedQuery($query, "i", $userId);
    }
    /**
     * get all orders performed by and user filtered by months and order state
     */
    public function getFilteredOrders($userId, $months = null, $orderState = null)
    {
        $query = "SELECT * 
                    FROM ORDINE 
                    WHERE codUtente = ? ";
        $params = array($userId);
        $types = "i";

        if ($months !== null) {
            $query .= " AND dataOrdine >= DATE_SUB(NOW(), INTERVAL ? MONTH)";
            array_push($params, $months);
            $types .= "i";
        }
        if ($orderState !== null) {
            $query .= " AND statoOrdine = ?";
            if ($orderState === "Pending") {
                $query .= " OR statoOrdine = 'Shipping'";
            }
            array_push($params, $orderState);
            $types .= "s";
        }
        $query .= " ORDER BY dataOrdine DESC";

        return $this->dynamicParametrizedQuery($query, $types, $params);
    }
    public function getAllProducts()
    {
        $query = "SELECT *
                    FROM PRODOTTO
                    WHERE NOT disabilitato
                    ORDER BY nome";
        return $this->simpleQuery($query);
    }
    /**
     * get product with the review rating, if there is no review will give an empty row
     */
    public function getProductwithRating($productId)
    {
        $query = "SELECT P.codProdotto, P.nome, P.descrizione, P.prezzo, P.immagine, P.quantitaResidua, CAST(AVG(R.votoRecensione) as DECIMAL(2,1)) mediaVoto
                    FROM PRODOTTO P, RECENSIONE R
                    WHERE P.codProdotto = R.codProdotto 
                    AND NOT disabilitato
                    AND P.codProdotto = ?";
        return $this->parametrizedQuery($query, "i", $productId);
    }
    public function getProductReviews($productId)
    {
        $query = "SELECT U.nomeUtente, R.votoRecensione, R.commento, R.dataRecensione
                    FROM RECENSIONE R, UTENTE U
                    WHERE R.codUtente = U.codUtente
                    AND R.codProdotto = ?
                    ORDER BY dataRecensione DESC";
        return $this->parametrizedQuery($query, "i", $productId);
    }
    public function addItemToCart($productId, $userId, $quantity)
    {
        $query = "INSERT INTO CARRELLO(codProdotto, codUtente, quantita)
                    VALUES(?, ?, ?)";
        return $this->parametrizedNoresultQuery($query, "iii", $productId, $userId, $quantity);
    }
    public function getSingleCartItem($productId, $userId)
    {
        $query = "SELECT *
                    FROM CARRELLO
                    WHERE codProdotto = ? 
                    AND codUtente = ?";
        return $this->parametrizedQuery($query, "ii", $productId, $userId);
    }
    // ↑↑↑ LAST FRANCO QUERY ↑↑↑
}
