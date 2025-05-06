<div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">
  <h2 class="text-xl font-semibold mb-4 text-gray-800">Create Post</h2>

  <!-- Error & Flash Message -->
  <div class="mb-4">
    <?php if (validation_errors()): ?>
      <div class="text-sm text-red-600 mb-2"><?= validation_errors(); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="text-sm text-red-600"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
  </div>

  <form action="<?= site_url('welcome/create'); ?>" method="post" enctype="multipart/form-data" class="space-y-6">

    <!-- Name Input -->
    <div>
      <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
      <input type="text" name="name" id="name"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Description Input -->
    <div>
      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
      <textarea name="description" id="description" rows="4"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>

    <!-- File Upload -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Upload Image</label>
      <input type="file" name="image1" accept=".jpg,.jpeg,.png"
        class="mt-2 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" />
    </div>

    <!-- Submit Button -->
    <div class="text-center">
      <button type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Create</button>
    </div>

  </form>
</div>