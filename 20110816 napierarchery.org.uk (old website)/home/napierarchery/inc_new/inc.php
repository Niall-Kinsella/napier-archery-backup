<?
// Set up a new session
session_start();

// Set up db connection
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

// Function controlling title bar
function top($title) {
  require ('hdr.php');
}

// Function controlling footer bar
function bot() {
  require ('ftr.php');
}

// Hit logger - is it really necessary?
function loghit($addr) {
  global $db;
  $values = array();
  $values['timestamp'] = time();
  $values['host'] =& $addr;
  $db->autoExecute("counter", $values, DB_AUTOQUERY_INSERT);
}

?>