<?php
require_once 'simple_html_dom.php';
$url = 'http://www.bn.ru/zap_fl.phtml?kkv1=2&kkv2=2&price1=&price2=&so1=&so2=&sk1=&sk2=&first=1&sorttype=0&sort_ord=0&region8=8&region41=41&region42=42&region43=43&region275=275&region276=276&region46=46&text=&start=250';

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Find flat');
$query = curl_exec($curl_handle);
curl_close($curl_handle);

//$string = "<ul class='ips'>my_content</ul>";
//get district
/*preg_match_all('/[^>]class=["\']distr2_2[\'"]*>(.*?)<\//',
           $query,
           $district
           );
print_r($district);*/

$html = str_get_html($query);
$ret = $html->find('.distr2_2');
//print_r($ret);
echo $ret->innertext;
?>