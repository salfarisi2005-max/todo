<?php
require_once("koneksi.php");
session_start();

// keadaan login mengharuskan kita punya session aktif
// $_SESSION['status_login'] = false;

$page_name = $_GET['page_name'] ?? "dashboard";

if (isset($_SESSION['status_login']) && $_SESSION['status_login']) {
    // jika login ada atau benar
    // munculkan html di bawah
    // di off 
} else {
    header("location:login.php"); // redirect ke halaman login.php
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="flex flex-col gap-4 items-center min-h-screen w-full bg-teal-600 text-white p-5">
        <div class="flex w-full bg-white rounded-lg min-h-40 overflow-hidden">
            <div class="flex flex-col p-5 bg-teal-800 text-white w-1/5">
                <ul class="flex flex-col w-full font-bold gap-4">
                    <li><a href="index.php"
                            class="hover:text-amber-200 <?php echo $page_name == 'dashboard' ? 'text-amber-300' : ''; ?>">Dashboard</a>
                    </li>
                    <li><a href="index.php?page_name=create_todo"
                            class="hover:text-amber-200 <?php echo $page_name == 'create_todo' ? 'text-amber-300' : ''; ?>">Create
                            New
                            Todo</a>
                    </li>
                    <li><a href="index.php?page_name=create_user"
                            class="hover:text-amber-200 <?php echo $page_name == 'create_user' ? 'text-amber-300' : ''; ?>">Create
                            user</a>
                    </li>
                    <li><a href="proses_logout.php" class="hover:text-amber-200">Logout</a></li>
                </ul>
            </div>
            <div class="flex flex-col p-5 flex-1 text-slate-800">
                <?php
                if ($page_name == "dashboard") {
                    include("pages/page_dashboard.php");
                }
                if ($page_name == "create_todo") {
                    include("pages/page_create_todo.php");
                }
                if ($page_name == "create_user") {
                    include("pages/page_create_user.php");
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>