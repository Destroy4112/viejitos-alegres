<?php

class Conexion
{
    private $conect;

    public function __construct()
    {
        $connectionString = "mysql:host=" . HOST . ";dbname=" . BD . ";charset=" . CHARSET;
        try {
            $this->conect = new PDO($connectionString, DB_USER, PASS);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Se ha conectado a la dB";

        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function conect()
    {
        return $this->conect;
    }

    public static function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', '$VIEJITOS@2023');
        $iv = substr(hash('sha256', '4112000'), 0, 16);
        $output = openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    public static function decryption($string)
    {
        $key = hash('sha256', '$VIEJITOS@2023');
        $iv = substr(hash('sha256', '4112000'), 0, 16);
        $output = openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);
        return $output;
    }
}
