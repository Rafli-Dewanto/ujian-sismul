<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modern Image Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configure Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f7ff',
                            100: '#e0eefe',
                            200: '#bae0fd',
                            300: '#7cc8fb',
                            400: '#36aaf5',
                            500: '#0d8de3',
                            600: '#0270c3',
                            700: '#015a9e',
                            800: '#064b83',
                            900: '#0a406d',
                            950: '#072a4a',
                        },
                    },
                },
            },
        }
    </script>

    <!-- Custom Styles -->
    <style type="text/tailwindcss">
        @layer utilities {
            .image-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .image-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.1), 0 8px 10px -6px rgba(59, 130, 246, 0.1);
            }
            .image-container {
                overflow: hidden;
                position: relative;
            }
            .image-container img {
                transition: transform 0.5s ease;
            }
            .image-container:hover img {
                transform: scale(1.05);
            }
            .image-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .image-container:hover .image-overlay {
                opacity: 1;
            }
            .masonry-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                grid-gap: 1.5rem;
                grid-auto-flow: dense;
            }
            @media (min-width: 768px) {
                .masonry-grid {
                    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                }
            }
            .skeleton {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            @keyframes pulse {
                0%, 100% {
                    opacity: 1;
                }
                50% {
                    opacity: 0.5;
                }
            }
        }
    </style>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white to-blue-50 min-h-screen flex flex-col">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto py-4 px-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="<?= site_url(); ?>" class="flex items-center space-x-2">
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-400">
                        Photo Gallery
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="<?= site_url('welcome/create'); ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-upload mr-2"></i>
                        Upload
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4 border-t border-gray-100 pt-4 space-y-4">
                <form action="<?= site_url('welcome/search'); ?>" method="get" class="relative">
                    <input 
                        type="search" 
                        name="query" 
                        placeholder="Search images..." 
                        class="w-full pl-10 pr-4 py-2 rounded-full border-blue-100 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    >
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </form>

                <div class="flex justify-between">
                    <a href="<?= site_url('welcome/create'); ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 w-full justify-center">
                        <i class="fas fa-upload mr-2"></i>
                        Upload
                    </a>
                </div>
            </div>
        </div>
    </header>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>