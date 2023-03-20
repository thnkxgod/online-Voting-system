<?php

session_start();
session_destroy();

// HTML/index.html
header("location: ../html/index.html");
?>