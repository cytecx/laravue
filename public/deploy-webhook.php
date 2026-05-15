<?php

$secret = 'R^UdB(H@}DH{&Imxyc,LwPujli&sO^>+';

$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

$hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);

if (!hash_equals($hash, $signature)) {
    http_response_code(403);
    exit('Invalid signature');
}

exec('sudo -u ubuntu /var/www/laravue/deploy.sh 2>&1', $output, $code);

http_response_code($code === 0 ? 200 : 500);
echo implode("\n", $output);
