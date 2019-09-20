<?php

require 'db.php';

$select = "SELECT * FROM abouts WHERE status=3";
$select_con = mysqli_query($db, $select);
$single_data = mysqli_fetch_assoc($select_con);

print_r($single_data);

