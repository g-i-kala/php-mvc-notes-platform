<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

/** @var array{title: string, body: string} $note */

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">
    <div class="text-sm text-right"> 
        <?= $note['created_at'] ?>
    </div>

    <div class="text-left"> 
        <p><?= htmlspecialchars($note['content']) ?></p>
    </div>

    <footer class="mt-8 space-x-4">
        <a href="/note/edit?id=<?= $note['id'] ?>" class="inline-block rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-lg hover:bg-green-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
        <a href="/notes" class="inline-block rounded-md bg-white px-3 py-2 text-sm font-semibold text-black shadow-lg hover:bg-indigo-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back to Notes</a>
    </footer>
    
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.view.php';
?>