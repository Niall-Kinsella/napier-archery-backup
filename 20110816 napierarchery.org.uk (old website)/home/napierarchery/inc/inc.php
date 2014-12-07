<?
// set up a new session
session_start();

// set up db connections here whenever tony has added mysql
ini_set('include_path',ini_get('include_path').":/usr/share/pear");
require_once('DB.php');
$dsn = 'mysql://napierarchery:archmysql@localhost/napierarchery_org_uk_-_db';
$db =& DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
$db->setFetchMode(DB_FETCHMODE_ASSOC);

PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'errhndl');

function errhndl ($err) {
  $body =  print_r($err,true);
  echo "<pre>" . $body. "</pre>";
}

function top($title) {
  require ('hdr.php');
}

function bot() {
  require ('ftr.php');
}

function loghit($addr) {
  global $db;
  $values = array();
  $values['timestamp'] = time();
  $values['host'] =& $addr;
  $db->autoExecute("counter", $values, DB_AUTOQUERY_INSERT);
}

?>