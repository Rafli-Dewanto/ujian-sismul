<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main class="container mx-auto px-4 py-8 flex-grow">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-blue-100">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-blue-700">Upload New Image</h2>
            </div>

            <form action="<?= site_url('welcome/create'); ?>" method="post" enctype="multipart/form-data" id="createPostForm">
                <div class="p-6 space-y-6">
                    <!-- Error & Flash Message -->
                    <?php if (validation_errors() || $this->session->flashdata('error')): ?>
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
                    <?php endif; ?>

                    <!-- Image Preview -->
                    <div class="border-2 border-dashed border-blue-200 rounded-lg p-4 transition-colors hover:border-blue-300">
                        <div id="preview-container" class="hidden relative">
                            <img id="image-preview" src="/placeholder.svg" alt="Preview" class="mx-auto max-h-64 rounded-md object-contain">
                            <button type="button" id="clear-image" class="absolute top-2 right-2 bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-sm hover:bg-red-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div id="upload-prompt" class="flex flex-col items-center justify-center py-8 cursor-pointer">
                            <div class="bg-blue-50 p-4 rounded-full mb-4">
                                <i class="fas fa-image text-blue-500 text-2xl"></i>
                            </div>
                            <p class="text-blue-700 font-medium mb-1">Click to upload an image</p>
                            <p class="text-gray-500 text-sm text-center">Supports JPG, JPEG, PNG (Max 10MB)</p>
                        </div>
                        <input type="file" name="image1" id="image1" accept=".jpg,.jpeg,.png" class="hidden">
                        <div id="fileError" class="text-sm text-red-600 mt-2 hidden">File size exceeds 10MB limit.</div>
                    </div>

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-blue-700 mb-1">Image Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            required 
                            minlength="3" 
                            maxlength="30" 
                            class="w-full px-3 py-2 border border-blue-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter a name for your image"
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
                            placeholder="Describe your image..."
                        ></textarea>
                        <p class="text-xs text-gray-500 text-right mt-1"><span id="char-count">0</span>/500 characters</p>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 flex justify-between">
                    <a href="<?= site_url(); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-upload mr-2"></i> Upload Image
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('image1');
        const fileError = document.getElementById('fileError');
        const previewContainer = document.getElementById('preview-container');
        const uploadPrompt = document.getElementById('upload-prompt');
        const imagePreview = document.getElementById('image-preview');
        const clearImage = document.getElementById('clear-image');
        const description = document.getElementById('description');
        const charCount = document.getElementById('char-count');
        const maxSize = 10 * 1024 * 1024; // 10MB in bytes
        
        // Handle file upload prompt click
        uploadPrompt.addEventListener('click', function() {
            fileInput.click();
        });
        
        // Handle file selection
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const fileSize = file.size;
                
                if (fileSize > maxSize) {
                    fileError.classList.remove('hidden');
                    return;
                }
                
                fileError.classList.add('hidden');
                
                // Create preview
                const reader = new FileReader();
                reader.onloadend = function() {
                    imagePreview.src = reader.result;
                    previewContainer.classList.remove('hidden');
                    uploadPrompt.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Handle clear image button
        clearImage.addEventListener('click', function() {
            fileInput.value = '';
            imagePreview.src = '';
            previewContainer.classList.add('hidden');
            uploadPrompt.classList.remove('hidden');
        });
        
        // Character count for description
        description.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        // Form validation
        document.getElementById('createPostForm').addEventListener('submit', function(event) {
            if (fileInput.files.length === 0) {
                event.preventDefault();
                fileError.textContent = 'Please select an image to upload.';
                fileError.classList.remove('hidden');
                return;
            }
            
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size;
                if (fileSize > maxSize) {
                    event.preventDefault();
                    fileError.textContent = 'File size exceeds 10MB limit.';
                    fileError.classList.remove('hidden');
                    return;
                }
            }
        });
    });
</script>