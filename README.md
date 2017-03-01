# nusoap
## 下载nusoap,解压出来有lib和samples
>samples中有很多client的例子
##注意问题，可能遇到一下错误提示

1、SOAP-ENV:Client: error in msg parsing: xml was empty, didn't parse!
> `$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';`
> `$server->service($HTTP_RAW_POST_DATA);`
> 参考：http://stackoverflow.com/questions/21685157/web-service-nusoap-laravel-4/21685649
> 说的是：$HTTP_RAW_POST_DATA 
> Warning This feature was DEPRECATED in PHP 5.6.0, and REMOVED as of PHP 7.0.0.
> The preferred method for accessing raw POST data is php://input, and $HTTP_RAW_POST_DATA is deprecated in PHP 5.6.0 onwards. Setting always_populate_raw_post_data to -1 will opt into the new behaviour that will be implemented in a future version of PHP, in which $HTTP_RAW_POST_DATA is never defined. 
那就是说php5.6之前还可以用了,但是以后建议使用 php://input,所以最好这样：
> `$rawPostData = file_get_contents("php://input");`
> `$server->service($rawPostData);`
