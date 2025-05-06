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
            <?php if (isset($image) && is_object($image)): ?>
                <!-- Single Image Display -->
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800"><?= $image->name ?></h1>
                </div>
                
                <div class="flex justify-center mb-6 space-x-4">
                    <a href="<?= site_url('welcome/delete/' . $image->id); ?>" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Delete</a>
                    <a href="<?= site_url('welcome/update/' . $image->id); ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Update</a>
                </div>
                
                <div class="flex justify-center">
                    <div class="rounded-full overflow-hidden shadow-lg border-4 border-white">
                        <img src="<?= site_url('upload/images/' . $image->filepath); ?>" alt="Post's Image" 
                            class="w-64 h-64 object-cover">
                    </div>
                </div>

            <?php elseif (isset($images) && is_array($images) && count($images) > 0): ?>
                <!-- Multiple Images Display -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($images as $img): ?>
                        <div class="bg-white rounded-lg shadow-md p-4 transition duration-300 hover:shadow-xl">
                            <h5 class="text-xl font-semibold text-gray-800 mb-3"><?= $img['name'] ?></h5>
                            <div class="flex justify-center mb-4">
                                <div class="rounded-full overflow-hidden border-4 border-gray-100">
                                    <img src="<?= site_url('upload/images/' . $img['filepath']); ?>" 
                                        alt="<?= $img['name'] ?>" 
                                        class="w-40 h-40 object-cover">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?= site_url('welcome/index/' . $img['id']); ?>" 
                                   class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
                                   View Details
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <p class="text-xl text-gray-500">No images found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>