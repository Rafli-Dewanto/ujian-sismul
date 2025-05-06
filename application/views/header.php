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

    <header class="bg-white shadow-sm">
        <div class="container mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <a href="<?= site_url(); ?>">
                    <h1 class="text-2xl font-bold text-primary-700">Photo Gallery</h1>
                </a>
                <nav>
                    <a href="<?= base_url('Welcome/create'); ?>"
                        class="px-4 py-2 bg-primary-500 rounded-lg hover:bg-primary-600 transition duration-300 shadow-md hover:shadow-lg">
                        Upload New
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Mobile Nav -->
    <div id="mobile-menu" class="md:hidden hidden bg-blue-800 text-white p-4">
        <a href="#" class="block py-2 border-b border-blue-700">Login</a>
        <a href="<?= site_url('welcome/create'); ?>" class="block py-2">Create</a>
    </div>