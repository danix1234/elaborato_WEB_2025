<?php

require_once "../bootstrap.php";

if (!isLoggedIn()) {
    die('Non sei attualmente loggato.');
}

// Ottieni l'userId all'inizio dello script
$userId = getCurrentUserId();

// Gestione del metodo POST per aggiornare più notifiche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST;
    if (!isset($input['notificheIds']) || !is_array($input['notificheIds'])) {
        http_response_code(400);
        die('Richiesta non valida: notificheIds mancante o non è un array.');
    }

    try {
        foreach ($input['notificheIds'] as $codNotifica) {
            $dbh->markNotificationAsRead(intval($codNotifica), $userId);
        }
        http_response_code(200);
        echo 'Tutte le notifiche sono state segnate come lette.';
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $e) {
        http_response_code(500);
        echo 'Errore interno del server: ' . $e->getMessage();
    }
    exit;
}

// Gestione del metodo GET per aggiornare una singola notifica
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['codNotifica'])) {
    $codNotifica = intval($_GET['codNotifica']);

    try {
        $result = $dbh->markNotificationAsRead($codNotifica, $userId);
        if ($result) {
            http_response_code(200);
            echo 'Notifica segnata come letta.';
        } else {
            http_response_code(400);
            echo 'Errore durante l\'operazione.';
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo 'Errore interno del server: ' . $e->getMessage();
    }
    exit;
}

// Se il metodo non è supportato
http_response_code(405);
echo 'Metodo non consentito.';