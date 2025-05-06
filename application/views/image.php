<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main class="container mx-auto px-4 py-8 flex-grow">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center text-sm text-gray-500 mb-6">
            <a href="<?= site_url(); ?>" class="hover:text-blue-600 transition-colors">
                <i class="fas fa-home"></i>
                <span class="ml-1">Gallery</span>
            </a>
            <i class="fas fa-chevron-right mx-2 text-gray-400 text-xs"></i>
            <span class="text-gray-700 font-medium truncate"><?= $image->name ?></span>
        </nav>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Image Header -->
            <div class="relative">
                <!-- Image Actions - Desktop -->
                <div class="absolute top-4 right-4 z-10 hidden md:flex space-x-2">
                    <a href="<?= site_url('welcome/update/' . $image->id); ?>" class="bg-white/90 backdrop-blur-sm hover:bg-white text-blue-600 p-2 rounded-full shadow-md transition-all">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= site_url('welcome/delete/' . $image->id); ?>" class="bg-white/90 backdrop-blur-sm hover:bg-white text-red-600 p-2 rounded-full shadow-md transition-all">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <button class="bg-white/90 backdrop-blur-sm hover:bg-white text-gray-700 p-2 rounded-full shadow-md transition-all" id="download-button">
                        <i class="fas fa-download"></i>
                    </button>
                </div>

                <!-- Main Image -->
                <div class="bg-gray-100 flex justify-center items-center">
                    <img 
                        src="<?= site_url('upload/images/' . $image->filepath); ?>" 
                        alt="<?= $image->name ?>" 
                        class="max-h-[70vh] object-contain w-full"
                    />
                </div>
            </div>

            <!-- Image Details -->
            <div class="p-6 md:p-8">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <!-- Left Column: Title and Description -->
                    <div class="flex-1">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2"><?= $image->name ?></h1>
                        
                        <div class="flex items-center text-gray-500 mb-4">
                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                            <time datetime="<?= $image->created_at ?>">
                                <?= date('F j, Y', strtotime($image->created_at)) ?>
                            </time>
                        </div>
                        
                        <div class="bg-blue-50 p-4 rounded-lg mb-6">
                            <h3 class="text-sm font-semibold text-blue-700 mb-2">Description</h3>
                            <p class="text-gray-700 whitespace-pre-line">
                                <?= $image->description ?>
                            </p>
                        </div>
                    </div>
                        
                        <!-- Mobile Actions -->
                        <div class="flex flex-col gap-2 md:hidden">
                            <a href="<?= site_url('welcome/update/' . $image->id); ?>" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-edit mr-2"></i> Edit Image
                            </a>
                            <a href="<?= site_url('welcome/delete/' . $image->id); ?>" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <i class="fas fa-trash-alt mr-2"></i> Delete Image
                            </a>
                            <button id="mobile-download-button" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-download mr-2"></i> Download Image
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Download functionality
        const downloadButton = document.getElementById('download-button');
        const mobileDownloadButton = document.getElementById('mobile-download-button');
        
        function downloadImage() {
            const link = document.createElement('a');
            link.href = '<?= site_url('upload/images/' . $image->filepath); ?>';
            link.download = '<?= $image->name ?>';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
        
        downloadButton.addEventListener('click', downloadImage);
        mobileDownloadButton.addEventListener('click', downloadImage);
    });
</script>