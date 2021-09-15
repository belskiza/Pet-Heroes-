<?php

require_once 'header.php';
require_once 'additional/pet.inc.php';

?>

<body>
<div class="container">
    <p><?php echo $result->fetch_assoc(); ?> </p>
</div>
</body>
