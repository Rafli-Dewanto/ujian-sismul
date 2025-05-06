<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="max-w-2xl mx-auto px-4 mt-8">
  <!-- Header -->
  <div class="text-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Update Image</h1>
    <p class="text-gray-500 mt-2">Make changes to your image and its details</p>
  </div>

  <!-- Validation Errors -->
  <?php if (validation_errors() || $this->session->flashdata('error')): ?>
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
              clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
          <div class="mt-2 text-sm text-red-700">
            <?php echo validation_errors(); ?>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Form Container -->
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <form action="<?php echo site_url('welcome/update/' . $images->id); ?>" method="post" enctype="multipart/form-data"
      class="p-6">

      <!-- Image Preview -->
      <div class="mb-8 flex justify-center">
        <div class="relative w-full max-w-md">
          <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden">
            <img id="image" class="w-full h-auto object-contain max-h-64"
              src="<?php echo site_url('upload/images/' . $images->filepath); ?>" alt="Image preview">
          </div>
        </div>
      </div>

      <!-- Form Fields -->
      <div class="space-y-6">
        <!-- Image Name -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Image Name</label>
          <input type="text" name="name" id="name"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            value="<?php echo $images->name; ?>" required>
        </div>

        <!-- Description -->
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
          <textarea name="description" id="description" rows="4"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"><?php echo $images->description; ?></textarea>
        </div>

        <!-- File Upload -->
        <div>
          <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Update Image</label>
          <div class="flex items-center space-x-2">
            <label
              class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Select image
              <input type="file" name="image" id="file" class="sr-only" accept="image/*" onchange="thumbnail()">
            </label>
          </div>
          <p class="mt-1 text-xs text-gray-500" id="filename">No file selected</p>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="mt-8 flex justify-center">
        <button type="submit"
          class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
          Update Image
        </button>
      </div>
    </form>
  </div>

  <!-- Back Link -->
  <div class="mt-6 text-center">
    <a href="<?php echo site_url('welcome'); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
      ← Back to Gallery
    </a>
  </div>
</div>

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
      preview.src = "<?php echo site_url('upload/images/' . $images->filepath); ?>";
      filename.textContent = "No file selected";
    }
  }

  // Auto-resize textarea based on content
  const textarea = document.getElementById('description');
  textarea.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  });

  // Initialize textarea height
  window.addEventListener('load', function() {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
  });
</script>