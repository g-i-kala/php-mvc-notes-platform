<!-- app/views/layout.php -->

<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/header.php'); ?>


<div class="mx-auto w-full flex-1">
    <main>
        <?= $content ?? '' ?>
    </main>
</div>

<?php require('partials/footer.php'); ?>