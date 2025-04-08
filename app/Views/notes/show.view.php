<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">
    <div class="text-sm text-right"> 
        <?= $note['created_at'] ?>
    </div>

    <div class="text-left"> 
        <p><?= htmlspecialchars($note['content']) ?></p>
    </div>


    <form method="POST" class="mt-6">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="note_id" value="<?= htmlspecialchars($note['id']) ?>"> 
        <button class="text-sm text-red-500 hover:cursor-pointer">Delete</button>
    </form>
    <div class="my-4">
        <a href="/notes" class=" text-blue-400 hover:text-blue-700">Back to Notes</a>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.view.php';
?>