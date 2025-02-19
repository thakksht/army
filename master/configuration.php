<?php
 //ini_set('default_charset','ISO-8859-1');
 error_reporting(1);

  $configDbHost = 'localhost';
  $configDbUser = 'phptest_table';
  $configDbPassword = 'tablebooking';
  $configHTTPPort   = '80';  
  
  $debug = 1 ;
  $configDbName = 'phptest_table_booking';
  $configDbPrefix = '';
  $configAbsPath = '/home/phptest/public_html/restaurant';
  $configSitePath = 'http://iwwphp.info/restaurant/';
  $secureSitePath = 'http://iwwphp.info/restaurant/';
  $configAbsAdminPath = '/home/phptest/public_html/master';
  $configSiteAdminPath = 'http://iwwphp.info/restaurant/master';
  $configSiteDomain		= 'http://iwwphp.info/restaurant/'; //e.g. faith.com
  $configSiteName = 'phptest_table_booking';
  $configOffline = '0'; 
  $configJsOffline = '1';
  $configSessionLifetime = '16000000000000000';  //*** seconds
  $configOfflineMessage = 'This site is down for <br />maintenance. Please check <br>back again soon.';
  $configJsDisabledMessage = "<h3>JavaScript required </h3><p> The Website requires JavaScript to run. This web browser either does not support JavaScript, or scripts are being blocked.</p>	<p>To find out whether your browser supports JavaScript, or to allow scripts, see the browser's online help.</p>";
 
if ($_SERVER['SERVER_PORT'] != $configHTTPPort)
{
  $configSitePath = str_replace('http','https',$configSitePath);
}

?>
