<div class="container mx-auto py-8 px-4">
    <div class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="<?= site_url('welcome/index/' . $image->id); ?>">
                <article
                    class="overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition duration-300 bg-white">
                    <!-- Image -->
                    <img alt="<?= $image->name ?>" src="<?= site_url('upload/images/' . $image->filepath); ?>"
                        class="h-56 w-full object-cover" />

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Date -->
                        <time datetime="<?= $image->created_at ?>" class="block text-xs text-gray-400 mb-2">
                            <?= date('F j, Y', strtotime($image->created_at)) ?>
                        </time>

                        <!-- Title -->
                        <h3 class="text-xl font-semibold text-gray-900 hover:text-blue-600 transition">
                            <?= $image->name ?>
                        </h3>

                        <!-- Description -->
                        <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                            <?= $image->description ?>
                        </p>

                        <!-- Buttons -->
                        <div class="mt-6 mx-auto flex justify-between w-full">
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
            </a>
        </div>
    </div>
</div>