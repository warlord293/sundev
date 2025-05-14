<?php
// index.php (Entry Point)

// Start session and include config
session_start();
require_once 'config/db.php';

// Route pages
$page = $_GET['page'] ?? 'home';

if ($page != 'signup' && $page != 'forgot-password' && $page != 'login') include 'config/header.php';

$routes = [
    'about' => 'pages/about.php',
    'projects' => 'pages/projects.php',
    'trainings' => 'pages/trainings.php',
    'login' => 'pages/login.php',
    'logout' => 'pages/logout.php',
    'forgot-password' => 'pages/forgot_password.php',
    'signup' => 'pages/signup.php',
    'dashboard' => 'pages/user_dashboard.php',
    'admin' => 'pages/admin_dashboard.php',
    'contact' => 'pages/contact.php',
    'home' => 'pages/home.php'
];
$page = $_GET['page'] ?? 'home';
$file = $routes[$page] ?? 'pages/404.php';
if (file_exists($file)) {
    include $file;
} else {
    header("HTTP/1.0 404 Not Found");
    include 'pages/404.php';
}

if ($page != 'signup' && $page != 'forgot-password' && $page != 'login') include 'config/footer.php';