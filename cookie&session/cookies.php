<?php 
include "sidebar.php"; 
?>

<div class="ml-64 p-10">
    <script src="https://cdn.tailwindcss.com"></script>
    <h2 class="text-3xl font-bold mb-5">Test des cookies</h2>

    <?php
    setcookie("test_cookie", "Hello Asmae", time() + 3600);
    echo "<p class='p-3 bg-gray-100 rounded shadow mb-3'>Cookie créé !</p>";

    if (isset($_COOKIE['test_cookie'])) {
        echo "<p class='p-3 bg-gray-50 rounded shadow'>Cookie : ".$_COOKIE['test_cookie']."</p>";
    } else {
        echo "<p class='p-3 bg-yellow-100 rounded shadow'>Recharge la page pour voir le cookie.</p>";
    }
    ?>
</div>
