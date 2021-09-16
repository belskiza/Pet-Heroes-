<?php
session_start();
session_unset();
session_destroy();

header("location: ../landing_page.php?");
exit();