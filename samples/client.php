<?php
/**
 * Created by PhpStorm.
 * User: zpc
 * Date: 17-3-1
 * Time: 上午11:02
 */

require_once '../lib/nusoap.php';

$client = new nusoap_client('http://www.soap.com/samples/server.php');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$client->xml_encoding = 'UTF-8';

$params = ['name' => 'Bruce ice'];
$result = $client->call('sayHello', $params);

if(! $err = $client->getError()) {
    echo "返回结果：", $result;
}else{
    echo "调用错误：", $err;
}