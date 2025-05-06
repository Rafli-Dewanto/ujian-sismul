<ul class="collection">
    <?php foreach ($images as $data) :?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="<?= site_url('welcome/index/' . $data["id"]); ?>">
                    <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
                        <img alt="" src="<?= site_url('upload/images/' . $data["filepath"]); ?>"
                            class="h-56 w-full object-cover" />

                        <div class="bg-white p-4 sm:p-6">
                            <time datetime="2022-10-10" class="block text-xs text-gray-500">
                                <?= $data["created_at"] ?>
                            </time>

                            <a href="#">
                                <h3 class="mt-0.5 text-lg text-gray-900"><?= $data["name"] ?></h3>
                            </a>

                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                <?= $data["description"]; ?>
                            </p>
                        </div>
                    </article>
                </a>
            </div>  
    <?php endforeach;?>
</ul>

<button class="btn red">
    <a onclick="return confirm('Apakah kamu yakin ingin menghapus semua data ini ?')"
        href="<?php echo site_url('welcome/deleteAll') ?>"> DELETE ALL</a>
</button>

