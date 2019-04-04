<?php

session_start();

unlink($_SESSION["path"]);

session_destroy();

header("Location: login.php");
