<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>

<div class="box"style="width: 100%; height: 400px; margin: 0 auto">
  <div class="box-header">
    <h3 class="box-title"><i class="fas fa-bars mr-1"></i><?= $judul_widget ?></h3>
  </div>
  <div class="box-body content">
    <ul class="divide-y">
      <?php foreach($menu_kiri as $data): ?>
      <li><a href="<?= site_url("artikel/kategori/$data[slug]"); ?>" class="py-2 block"><?= $data['kategori']; ?></a>
        <?php if(count($data['submenu'] ?? []) > 0): ?>
        <ul class="divide-y">
          <?php foreach($data['submenu'] as $submenu): ?>
          <li><a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>" class="py-2 block"><?= $submenu['kategori']?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>