<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Multimedia</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col">
  <main class="flex-grow">
    <?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
  </main>

  <footer class="bg-blue-900 text-white mt-96">
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-wrap">
        <div class="w-full">
          <h5 class="text-xl font-medium mb-4">Sistem Multimedia</h5>
          <blockquote class="border-l-4 border-gray-500 pl-4 my-4">
            <p class="text-gray-300">Group 5</p>
            <ul>
              <li>Rafli Satya Dewanto</li>
              <li> Fierza Heikkal</li>
              <li>Timoty Joel</li>
            </ul>
          </blockquote>
        </div>
      </div>
    </div>
    <div class="border-t border-blue-800">
      <div class="container mx-auto px-4 py-4">
        <small>
          Copyright © <?= date("Y"); ?> Gunadarma University. All rights reserved.
        </small>
      </div>
    </div>
  </footer>

  <!-- Alpine.js for any interactive components (replacement for Materialize JS) -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
    // For mobile navigation (if needed)
    document.addEventListener('alpine:init', () => {
      Alpine.store('nav', {
        open: false,
        toggle() {
          this.open = !this.open;
        }
      });
    });
  </script>
</body>

</html>