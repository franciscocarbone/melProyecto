<?php
$variable='palabra';
print "<p>En plano: ".$variable;
print "<p>En md5:".md5($variable);
print "<p>En SHA-1". sha1($variable);
print "<p>En SHA-256".hash(sha256,$variable);
print "<p>En SHA-512".hash(sha512,$variable);
print "<p>En Wirphool".hash(whirlpool,$variable);

?>
