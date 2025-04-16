<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

$heading = "Dashboard";
ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">
    <div class="mx-auto py-8">
        <h1 class="font-bold">Welcome,
            <?= isset($_SESSION['user'])
                ? htmlspecialchars($_SESSION['user']['username']) :
                '<p class="font-normal"> Please log in or register </p>' ?>
        </h1>
    </div>

    <div class="dashboard__content">
        #dajse
    </div>


</div>

<?php
$content = ob_get_clean();
include 'layout.view.php';
?>