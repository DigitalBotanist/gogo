<?php
// this file includes all the files in the libs


session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/libs/helpers.php'; 
require_once __DIR__ . '/libs/filter.php';
require_once __DIR__ . '/libs/query_database.php';
require_once __DIR__ . '/libs/verify-user.php';