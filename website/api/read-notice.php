<?php
require_once '../config/database.php'; // Includi la connessione al database
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['notificheIds']) || !is_array($input['notificheIds'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Richiesta non valida.']);
        exit;
    }

    try {
        foreach ($notificheIds as $codNotifica) {
            $dbh->markNotificationAsRead($codNotifica, $userId);
        }
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Errore interno del server.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Metodo non consentito.']);
}
