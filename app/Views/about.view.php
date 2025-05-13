<?php
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

ob_start();

?>
<div class="mx-auto max-w-7xl py-6 sm-px-6 lg:px-8 space-y-2">
   <h1 class="text-2xl font-bold">Notes Platform</h1>
   <p>Welcome to the Notes Platform! This project is a simple notes application built using PHP and the MVC architecture. It showcases my understanding of how frameworks like Laravel work by implementing similar concepts from scratch.</p>
   <h2 class="text-xl font-bold">Features</h2>
   <ul class="list-disc list-inside">
    <li>CRUD Operations: Create, read, update, and delete notes.</li>
    <li>Routing: Custom routing class to handle HTTP requests.</li>
    <li>Authentication: (Planned) Implement proper user authentication.</li>
    <li>Styling: Tailwind CSS for modern and responsive design.</li>
   </ul>
</div>

<?php
$content = ob_get_clean();
include 'layout.view.php';
?>