<?php
session_start();
session_unset();
session_destroy();

header("location: ../Pet-Heroes-/landing_page.php?");
exit();