<?php

//PHP script to Encrypt & Decrypt Data

define('AES_256_CBC', 'aes-256-cbc');
$encryption_key = "";
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(AES_256_CBC));
$data = "Here's some data to encrypt!";
echo "Before encryption: $data\n\n";
echo "<BR>";
$encrypted = openssl_encrypt($data, AES_256_CBC, $encryption_key, 0, $iv);
echo "Encrypted: $encrypted\n\n";
$encrypted = $encrypted . ':' . $iv;
$parts = explode(':', $encrypted);
print_r($parts);

$decrypted = openssl_decrypt($parts[0], AES_256_CBC, $encryption_key, 0, $parts[1]);
echo "<BR>";
echo "Decrypted: $decrypted\n\n";

?>
