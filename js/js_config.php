<?
/*
* Artistech Media has made the contents of this file
* available under a CC-GNU-GPL license:
*
* http://creativecommons.org/licenses/GPL/2.0/
*
* A copy of the full license can be found as part of this
* distribution in the file LICENSE.TXT.
* 
* You may use dig.ccMixter software in accordance with the
* terms of that license. You agree that you are solely 
* responsible for your use of dig.ccMixter software and you
* represent and warrant to Artistech Media that your use
* of dig.ccMixter software will comply with the CC-GNU-GPL.
*
* $Id: js_config.php 14182 2010-02-27 04:56:36Z fourstones $
*
*/

require_once( dirname(__FILE__) . '/../config.php');

$js =<<<EOF

var DIG_ROOT_URL      =  '{$DIG_ROOT_URL}';
var QUERY_ROOT_URL    =  '{$QUERY_ROOT_URL}';
var QUERY_PROXY_URL   =  '{$QUERY_PROXY_URL}';
var CCM_QUERY_URL     =  '{$CCM_QUERY_URL}';

EOF;

header('Content-type: text/javascript');
print $js;
exit;
?>