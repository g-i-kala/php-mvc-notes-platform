<?php

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">

    <div class="dashboard__content">
        <h1> Welcome, <?= isset($_SESSION['user']) ? $_SESSION['user']['username'] : 'Guest'  ?> </h1>
        #dajse 
    </div>


</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.view.php';
?>