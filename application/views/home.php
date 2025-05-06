<main class="container mx-auto py-12 px-4">
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-3">My Collection</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Browse through this curated collection of beautiful moments captured
            in time.</p>
    </div>
    <?php if (count($images) > 0): ?>
        <button class="px-3 py-2 bg-red-600 rounded-lg text-white">
            <a onclick="return confirm('Apakah kamu yakin ingin menghapus semua data ini ?')"
                href="<?php echo site_url('welcome/deleteAll') ?>"> Delete All</a>
        </button>
    <?php endif; ?>
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
</main>