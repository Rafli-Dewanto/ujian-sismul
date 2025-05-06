<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main class="container mx-auto px-4 py-8 flex-grow">
    <div class="max-w-2xl mx-auto">
        <a href="<?= site_url(); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
            <i class="fas fa-arrow-left mr-2"></i> Back to Gallery
        </a>
        
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-blue-100">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-blue-700">Update Image</h2>
            </div>

            <!-- Validation Errors -->
            <?php if (validation_errors() || $this->session->flashdata('error')): ?>
                <div class="px-6 pt-4">
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <?= validation_errors(); ?>
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('welcome/update/' . $images->id); ?>" method="post" enctype="multipart/form-data">
                <div class="p-6 space-y-6">
                    <!-- Image Preview -->
                    <div class="mb-6 flex justify-center">
                        <div class="relative w-full max-w-md">
                            <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden">
                                <img id="image" class="w-full h-auto object-contain max-h-64" src="<?= site_url('upload/images/' . $images->filepath); ?>" alt="Image preview">
                            </div>
                        </div>
                    </div>

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-blue-700 mb-1">Image Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="<?= $images->name; ?>" 
                            required 
                            minlength="3" 
                            maxlength="30" 
                            class="w-full px-3 py-2 border border-blue-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <!-- Description Input -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-blue-700 mb-1">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            minlength="5" 
                            maxlength="500" 
                            required
                            class="w-full px-3 py-2 border border-blue-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        ><?= $images->description; ?></textarea>
                        <p class="text-xs text-gray-500 text-right mt-1"><span id="char-count"><?= strlen($images->description); ?></span>/500 characters</p>
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label for="file" class="block text-sm font-medium text-blue-700 mb-1">Update Image</label>
                        <div class="flex items-center space-x-2">
                            <label class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
                                <i class="fas fa-image mr-2 text-blue-600"></i>
                                Select image
                                <input type="file" name="image" id="file" class="sr-only" accept="image/*" onchange="thumbnail()">
                            </label>
                        </div>
                        <p class="mt-1 text-xs text-gray-500" id="filename">No file selected</p>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 flex justify-between">
                    <a href="<?= site_url(); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Image
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function thumbnail() {
        var preview = document.getElementById('image');
        var file = document.getElementById('file').files[0];
        var reader = new FileReader();
        var filename = document.getElementById('filename');

        reader.onloadend = function() {
            preview.src = reader.result;
            if (file) {
                filename.textContent = file.name;
            } else {
                filename.textContent = "No file selected";
            }
        }

        if (file) {
            reader.readAsDataURL(file);
            filename.textContent = file.name;
        } else {
            preview.src = "<?= site_url('upload/images/' . $images->filepath); ?>";
            filename.textContent = "No file selected";
        }
    }

    // Character count for description
    document.addEventListener('DOMContentLoaded', function() {
        const description = document.getElementById('description');
        const charCount = document.getElementById('char-count');
        
        description.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        // Auto-resize textarea based on content
        function resizeTextarea() {
            description.style.height = 'auto';
            description.style.height = (description.scrollHeight) + 'px';
        }
        
        // Initialize textarea height
        resizeTextarea();
        
        // Update height on input
        description.addEventListener('input', resizeTextarea);
    });
</script>