<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <div class="w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="<?= site_url('welcome/index/' . $image->id); ?>">
                    <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
                        <img alt="" src="<?= site_url('upload/images/' . $image->filepath); ?>"
                            class="h-56 w-full object-cover" />

                        <div class="bg-white p-4 sm:p-6">
                            <time datetime="2022-10-10" class="block text-xs text-gray-500">
                                <?= $image->created_at ?>
                            </time>

                            <a href="#">
                                <h3 class="mt-0.5 text-lg text-gray-900"><?= $image->name ?></h3>
                            </a>

                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                <?= $image->description; ?>
                            </p>
                        </div>
                    </article>
                </a>
            </div>
        </div>
    </div>
</body>

</html>