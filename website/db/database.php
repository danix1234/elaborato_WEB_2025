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

    // ↓↓↓ FIRST DANIELE QUERY ↓↓↓
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
    public function getLatestProduct()
    {
        $query = "SELECT *
                    FROM PRODOTTO
                    ORDER BY codProdotto DESC
                    LIMIT 1";
        return $this->simpleQuery($query);
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
                    SET disabilitato = NOT disabilitato
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
    public function getLastOrderId()
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
    public function updateOrdersState($userId)
    {
        $query = "UPDATE ORDINE
                    SET statoOrdine='Shipped'
                    WHERE dataConsegna < NOW() AND statoOrdine='Shipping' AND codUtente = ?;";
        return $this->parametrizedNoresultQuery($query, "i", $userId);
    }
    public function getUser($userId)
    {
        $query = "SELECT *
                    FROM UTENTE
                    WHERE codUtente = ? AND NOT disabilitato;";
        return $this->parametrizedQuery($query, "i", $userId);
    }
    public function updateUser($userId, $name, $address, $city)
    {
        $query = 'UPDATE UTENTE
                    SET nomeUtente = ?, indirizzo = ?, citta = ?
                    WHERE codUtente = ? AND NOT disabilitato';
        return $this->parametrizedNoresultQuery($query, "sssi", $name, $address, $city, $userId);
    }
    public function updateUserPrivilegies($userId, $privilegies)
    {
        $query = 'UPDATE UTENTE
                    SET privilegi = ?
                    WHERE codUtente = ? AND NOT disabilitato';
        return $this->parametrizedNoresultQuery($query, "ii", $privilegies, $userId);
    }
    public function toggleUser($userId)
    {
        $query = 'UPDATE UTENTE
                SET disabilitato = NOT disabilitato
                WHERE codUtente = ?';
        return $this->parametrizedNoresultQuery($query, "i", $userId);
    }
    public function getCartItemPlusProductData($userId, $productId)
    {
        $query = 'SELECT *
                    FROM CARRELLO C, PRODOTTO P
                    WHERE C.codProdotto = P.codProdotto AND C.codutente = ? AND C.codProdotto = ?';
        return $this->parametrizedQuery($query, "ii", $userId, $productId);
    }
    public function getAllUsers()
    {
        $query = 'SELECT *
                    FROM UTENTE
                    ORDER BY codUtente';
        return $this->simpleQuery($query);
    }
    public function getAllProductsEvenDisabled()
    {
        $query = 'SELECT *, C.nome AS nomeCategoria
                    FROM PRODOTTO P, CATEGORIA C
                    WHERE P.codCategoria = C.codCategoria
                    ORDER BY P.codProdotto';
        return $this->simpleQuery($query);
    }
    // ↑↑↑ LAST DANIELE QUERY ↑↑↑

    // ↓↓↓ FIRST GIUSEPPE QUERY ↓↓↓
    public function getFilteredNotifications($userId, $notificationState = null)
    {
        // Query di base
        $query = "SELECT * 
              FROM NOTIFICA 
              WHERE codUtente = ?";
        $params = [$userId];  // Parametri della query
        $types = "i";         // Tipi per i parametri (es. i = integer, s = string)

        // Filtro opzionale per stato della notifica
        if ($notificationState !== null && in_array($notificationState, ['0', '1'], true)) {
            $query .= " AND letto = ?";
            $params[] = $notificationState;
            $types .= "s";
        }

        // Ordina per data decrescente
        $query .= " ORDER BY dataNotifica DESC";

        // Esegui la query parametrizzata
        return $this->parametrizedQuery($query, $types, ...$params);
    }


    public function markNotificationAsRead($notificationId, $userId)
    {
        $query = "UPDATE NOTIFICA 
              SET letto = 1 
              WHERE codNotifica = ? AND codUtente = ?";
        $types = "ii"; // Assumendo che codNotifica e codUtente siano entrambi interi

        return $this->parametrizedNoresultQuery($query, $types, $notificationId, $userId);
    }
    public function getRandomProducts($n = 12)
    {
        $query = "SELECT *
        FROM PRODOTTO
        ORDER BY RAND() LIMIT ?";
        return $this->parametrizedQuery($query, "i", $n);
    }

    public function getSearchedProductByName($productName)
    {
        $query = "SELECT *
                    FROM PRODOTTO
                    WHERE NOT disabilitato AND nome LIKE CONCAT('%', ?, '%');";
        return $this->parametrizedQuery($query, "s", $productName);
    }

    public function getProductOnCategory($codCategoria)
    {
        $query = "SELECT *
                    FROM PRODOTTO
                    WHERE NOT disabilitato AND codCategoria = ?;";
        return $this->parametrizedQuery($query, "i", $codCategoria);
    }

    public function getProductForCategoryAndSearch($productName, $categoryId)
    {
        $query = "SELECT *
                    FROM PRODOTTO
                    WHERE NOT disabilitato AND nome LIKE CONCAT('%', ?, '%') AND codCategoria = ?;";
        return $this->parametrizedQuery($query, "si", $productName, $categoryId);
    }

    public function getAverageRating($productId)
    {
        $query = "SELECT CAST(AVG(R.votoRecensione) AS DECIMAL(2,1)) AS mediaVoto
              FROM RECENSIONE R
              WHERE R.codProdotto = ?";
        $result = $this->parametrizedQuery($query, "i", $productId);
        return $result[0]['mediaVoto'] ?? 0.0; // Restituisce la media o null se non ci sono recensioni
    }

    // ↑↑↑ LAST GIUSEPPE QUERY ↑↑↑

    // ↓↓↓ FIRST FRANCO QUERY ↓↓↓
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
    public function getSingleOrder($userId, $orderId)
    {
        $query = "SELECT *
                    FROM ORDINE
                    WHERE codUtente = ? 
                    AND codOrdine = ?";
        return $this->parametrizedQuery($query, "ii", $userId, $orderId);
    }
    /**
     * get all orders performed by and user filtered by months and order state
     */
    public function getFilteredOrders($userId, $months = null, $orderState = null)
    {
        $query = "SELECT * 
                    FROM ORDINE 
                    WHERE codUtente = ? ";
        $params = array();
        $types = "i";

        if ($months != null) {
            $query .= " AND dataOrdine >= DATE_SUB(NOW(), INTERVAL ? MONTH)";
            array_push($params, $months);
            $types .= "i";
        }
        if ($orderState != null) {
            // by daniele: ti ho aggiunto le parentesi tonde, per sistemare un bug nella query
            $query .= " AND ( statoOrdine = ?";
            if ($orderState == "Pending") {
                $query .= " OR statoOrdine = 'Shipping'";
            }
            $query .= ")";
            array_push($params, $orderState);
            $types .= "s";
        }
        $query .= " ORDER BY dataOrdine DESC";

        /* NOTA: modificata da daniele, per semplificare il codice.
            semplicemente: passare la prima variabile normalmente, e tutte le variabili successive
            vanno messe in un array e passarlo utilizzando l'operatore splat (...$array).
            Se non vi crea problemi, scrivetemi pure ;-) */
        return $this->parametrizedQuery($query, $types, $userId, ...$params);
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
        $query = "SELECT U.privilegi, P.codProdotto, P.nome, P.descrizione, P.prezzo, P.immagine, P.quantitaResidua, CAST(AVG(R.votoRecensione) as DECIMAL(2,1)) mediaVoto
                    FROM PRODOTTO P, RECENSIONE R, UTENTE U
                    WHERE P.codProdotto = R.codProdotto 
                    AND U.codUtente = R.codUtente
                    AND NOT U.disabilitato
                    AND P.codProdotto = ?";
        return $this->parametrizedQuery($query, "i", $productId);
    }
    public function getProductReviews($productId)
    {
        $query = "SELECT U.privilegi, U.nomeUtente, R.votoRecensione, R.commento, R.dataRecensione
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
    public function modOrderState($orderId, $newOrderState, $userId)
    {
        $query = "UPDATE ORDINE
                    SET statoOrdine = ?
                    WHERE codOrdine = ? AND codUtente = ?";
        return $this->parametrizedNoresultQuery($query, "sii", $newOrderState, $orderId, $userId);
    }
    /**
     * query for the confirm to buy button
     */
    public function confirmBuyOrder($orderState, $orderId, $userId)
    {
        $query = "UPDATE ORDINE
                    SET statoOrdine = ?, pagato = 1, dataConsegna = DATE_ADD(NOW(), INTERVAL 10 SECOND)
                    WHERE codOrdine = ? AND codUtente = ?";
        return $this->parametrizedNoresultQuery($query, "sii", $orderState, $orderId, $userId);
    }
    /**
     * second part for confirm to buy button
     */
    public function updateProductStock($productId, $setQuantity)
    {
        $query = "UPDATE PRODOTTO
                    SET quantitaResidua = ?
                    WHERE codProdotto = ?";
        return $this->parametrizedNoresultQuery($query, "ii", $setQuantity, $productId);
    }
    /**
     * add order for buy now button
     */
    public function addOrderBuyNow($productId, $userId, $quantity)
    {
        $query = "INSERT INTO ORDINE(dataOrdine, statoOrdine, totale, pagato, codUtente)
                    VALUES(NOW(), 
                    'Pending', 
                    (SELECT prezzo * ? FROM PRODOTTO WHERE codProdotto = ?), 
                    0, 
                    ?)";
        return $this->parametrizedNoresultQuery($query, "iii", $quantity, $productId, $userId);
    }
    public function addOrderDetail($orderId, $productId, $quantity)
    {
        $query = "INSERT INTO DETTAGLIO_ORDINE(codOrdine, codProdotto, quantita)
                    VALUES(?, ?, ?)";
        return $this->parametrizedNoresultQuery($query, "iii", $orderId, $productId, $quantity);
    }
    public function hasboughtProduct($userId, $productId)
    {
        $query = "SELECT *
                    FROM ORDINE O, DETTAGLIO_ORDINE D
                    WHERE O.codOrdine = D.codOrdine
                    AND O.statoOrdine = 'Shipped'
                    AND O.codUtente = ?
                    AND D.codProdotto = ?";
        $result = $this->parametrizedQuery($query, "ii", $userId, $productId);
        return !empty($result);
    }
    public function insertReview($userId, $productId, $vote, $comment)
    {
        $query = "INSERT INTO RECENSIONE(codUtente, codProdotto, votoRecensione, commento, dataRecensione)
                    VALUES(?, ?, ?, ?, NOW())";
        return $this->parametrizedNoresultQuery($query, "iiis", $userId, $productId, $vote, $comment);
    }
    // ↑↑↑ LAST FRANCO QUERY ↑↑↑
}
