<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main class="container mx-auto px-4 py-8 flex-grow">
    <div class="space-y-8">
        <!-- Gallery Header -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-blue-600 mb-2">My Collection</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Browse through this curated collection of beautiful moments captured in time.
            </p>
        </div>

        <!-- Controls Bar -->
        <div class="bg-white rounded-lg shadow-sm p-4 sticky top-20 z-10">
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <!-- Left Controls -->
                <div class="flex flex-wrap items-center gap-2">
                    <!-- View Mode Toggle -->
                    <div class="bg-blue-50 rounded-lg p-1">
                        <button id="grid-view" class="px-3 py-1 rounded-md bg-blue-600 text-white text-sm font-medium">
                            <i class="fas fa-th mr-1"></i> Grid
                        </button>
                    </div>
                </div>

                <!-- Right Controls -->
                <div class="flex items-center">
                    <?php if (count($images) > 0): ?>
                        <a onclick="return confirm('Are you sure you want to delete all images?')" href="<?= site_url('welcome/deleteAll') ?>" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <i class="fas fa-trash-alt mr-2"></i> Delete All
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Gallery Content -->
        <?php if (count($images) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols2 lg:grid-cols-3 gap-3 my-4">
        <?php foreach ($images as $image): ?>
            <div class="group">
                <article
                    class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition duration-300 bg-white border border-gray-100 group-hover:border-primary-200">
                    <!-- Image Container -->
                    <div class="overflow-hidden h-64 relative">
                        <img alt="<?= $image['name'] ?>" src="<?= site_url('upload/images/' . $image['filepath']); ?>"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Date -->
                        <div class="flex items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <time datetime="<?= $image["created_at"] ?>" class="text-xs text-gray-500">
                                <?= date('F j, Y', strtotime($image["created_at"])) ?>
                            </time>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-semibold text-gray-800 hover:text-primary-600 transition group-hover:text-primary-600">
                            <?= $image['name'] ?>
                        </h3>

                        <!-- Description -->
                        <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                            <?= $image['description'] ?>
                        </p>

                        <!-- Buttons -->
                        <div class="mt-6 flex justify-between items-center">
                            <a href="<?= site_url('welcome/index/' . $image['id']); ?>"
                                class="text-sm font-medium text-primary-600 hover:text-primary-700 flex items-center gap-1 group">
                                <span>View details</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 transition transform group-hover:translate-x-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>


                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
            </div>
        <?php else: ?>
            <div class="text-center py-16">
                <div class="bg-blue-50 rounded-lg p-8 max-w-md mx-auto">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">No Images Found</h3>
                    <p class="text-gray-600 mb-6">
                        Your gallery is empty. Upload some images to get started!
                    </p>
                    <a href="<?= site_url('welcome/create'); ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Upload Your First Image
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>