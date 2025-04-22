<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
/** @var array<array{id: string, title: string}> $notes */

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">

    <?php foreach ($notes as $note) : ?>
    <a href="/note?id=<?= $note['id'] ?>"
        class="link size-fit self-center my-4  py-1 text-blue-400 hover:text-blue-700">
        <li>
            <?= htmlspecialchars($note['title']) ?>
        </li>
    </a>
    <?php endforeach; ?>
    <div class="mt-6">
        <a href='/notes/create'
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Create Note </a>
    </div>

</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.view.php';
?>