<?php
require_once '../includes/config/config.php';
session_start();
session_destroy();
header("location: login.php");
