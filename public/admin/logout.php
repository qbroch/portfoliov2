<?php
require_once __DIR__ . '/../../src/Auth.php';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit;
}
$auth = new Auth();
$auth->logout();
header('Location: ../login.php', true, 303);
exit;

?>
