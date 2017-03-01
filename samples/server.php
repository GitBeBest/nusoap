<?php
/**
 * Created by PhpStorm.
 * User: zpc
 * Date: 17-3-1
 * Time: 上午10:51
 */
require_once '../lib/nusoap.php';

$server = new nusoap_server();

$server->soap_defencoding = 'UTF-8';
$server->decode_utf8 = false;
$server->xml_encoding = 'UTF-8';
$server->configureWSDL('sayHello');

$server->register('sayHello', ["name" => "xsd:string"], ["return" => "xsd:string"]);

//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
$rawPostData = file_get_contents("php://input");
$server->service($rawPostData);

function sayHello($name) {
    return "Hello, {$name}!";
}