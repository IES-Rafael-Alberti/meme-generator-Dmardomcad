<?php
session_start();
if(!isset($_SESSION["usuarios"])) {
    header("Location: login.php");
    exit(0);
}