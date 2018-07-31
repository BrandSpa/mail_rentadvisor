<?php 

require_once "models/companies.class.php";
require_once "controllers/mail.class.php";

$companiesModel = new Companies();

$companies = $companiesModel->get();

$message = file_get_contents('templates/mail.html');

$mail = new Mail();

foreach ( $companies as $company ){
    
    $altMessage = $message;
    $altMessage = str_replace('{{points}}', $company['points']?:0, $altMessage);
    $mail->send($company['email'], "Reporte puntos gana", $altMessage);

}