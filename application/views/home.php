<ul class="collection">
    <?php foreach ($images as $data) :?>
        <li class="collection-item avatar">
            <img src="<?=site_url('upload/post/'.$data['filepath'])?>" alt="" class="circle">
            <p class="title"><?=$data['name'];?></p>
            <small> <?= $data['description'];?> </small>
            <a href="<?=site_url('welcome/index/'.$data['id'])?>" class="secondary-content">
        <i class="material-icons">visibility</i>   
            </a>
        </li>   
    <?php endforeach;?>
</ul>

<button class="btn red">
    <a onclick="return confirm('Apakah kamu yakin ingin menghapus semua data ini ?')"
        href="<?php echo site_url('welcome/deleteAll') ?>"> DELETE ALL</a>
</button>

