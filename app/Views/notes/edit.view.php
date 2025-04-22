<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
/** @var array{title: string, body: string} $note */

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8">

    <form method="POST" action="/note">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="note_id"
            value="<?= htmlspecialchars((string) $note['id']) ?>">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                <div class="mt-2">
                    <div
                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6"></div>
                        <input type="text" name="title" d="title"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            value="<?= $note['title'] ?>">
                    </div>
                    <?php if (isset($errors['title'])): ?>
                    <p class="text-red-500 font-bold text-sm mt-2">
                        <?= htmlspecialchars((string) $errors['title']) ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-span-full">
                <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                <div class="mt-2">
                    <textarea name="content" id="content" rows="3"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        maxlength="5000"
                        required><?= $note['content'] ?? '' ?></textarea>
                    <?php if (isset($errors['content'])): ?>
                    <p class="text-red-500 font-bold text-sm mt-2">
                        <?= htmlspecialchars((string) $errors['content']) ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <button form="note-delete"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadowlg hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
            <div class="justify-end space-x-4">
                <a href="/notes" type="button"
                    class="inline-block rounded-md bg-white px-3 py-2 text-sm font-semibold text-black shadow-lg hover:bg-indigo-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-lg hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
</div>
</form>

<form method="POST" action="/note" id="note-delete" class="mt-6">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="note_id"
        value="<?= htmlspecialchars((string) $note['id']) ?>">
</form>

</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.view.php';
?>