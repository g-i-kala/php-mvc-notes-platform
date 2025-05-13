<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">
Feel free to reach out to me at <a href="mailto:karocreativedesigns@gmail.com" class="text-blue-700">via email.</a>
</div>

<?php
$content = ob_get_clean();
include 'layout.view.php';
?>