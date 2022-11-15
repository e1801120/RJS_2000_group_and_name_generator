<?php
// Luodaan uusi SQLite3-olio
$db = new SQLite3('database.db');

// Luodaan kantaan taulu autot
$db->exec("CREATE TABLE students(id INTEGER PRIMARY KEY, fullname TEXT)");
?>
