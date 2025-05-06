<div class="container mx-auto py-8 px-4">
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="<?= site_url('welcome/index/' . $image->id); ?>">
                <div class="group">
                    <article
                        class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition duration-300 bg-white border border-gray-100 group-hover:border-primary-200">
                        <!-- Image Container -->
                        <div class="overflow-hidden h-64 relative">
                            <img alt="<?= $image->name ?>" src="<?= site_url('upload/images/' . $image->filepath); ?>"
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
                                <time datetime="<?= $image->created_at ?>" class="text-xs text-gray-500">
                                    <?= date('F j, Y', strtotime($image->created_at)) ?>
                                </time>
                            </div>

                            <!-- Title -->
                            <h3
                                class="text-xl font-semibold text-gray-800 hover:text-primary-600 transition group-hover:text-primary-600">
                                <?= $image->name ?>
                            </h3>

                            <!-- Description -->
                            <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                                <?= $image->description ?>
                            </p>

                            <!-- Buttons -->
                            <div class="mt-6 flex justify-start items-center space-x-4">
                                <a href="<?= site_url('welcome/update/' . $image->id); ?>"
                                    class="text-sm font-medium text-blue-600 hover:underline">
                                    ✏️ Update
                                </a>

                                <a href="<?= site_url('welcome/delete/' . $image->id); ?>"
                                    class="text-sm font-medium text-red-600 hover:underline">
                                    🗑️ Delete
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
        </div>
        </a>
    </div>
</div>
</div>