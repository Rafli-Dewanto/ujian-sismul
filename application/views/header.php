<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistem Multimedia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Material Icons -->
    <link href="<?= site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-blue-900 text-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="<?= site_url(); ?>" class="text-xl font-bold">Sistem Multimedia</a>
            <div class="hidden md:flex space-x-4">
                <a href="<?= base_url('Welcome/create'); ?>" class="hover:text-blue-200">Create</a>
                <a href="#" class="hover:text-blue-200">Login</a>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-toggle" class="material-icons focus:outline-none">menu</button>
            </div>
        </div>
    </nav>

    <!-- Mobile Nav -->
    <div id="mobile-menu" class="md:hidden hidden bg-blue-800 text-white p-4">
        <a href="#" class="block py-2 border-b border-blue-700">Login</a>
        <a href="<?= site_url('welcome/create'); ?>" class="block py-2">Create</a>
    </div>