<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
.width-full { width: max-content; }
.nav-search { margin-left: auto; }
.sticky-navbar {
    position: sticky; /* Makes the navbar sticky */
    top: 0; /* Sticks to the top of the viewport */
    z-index: 1000; /* Ensures it stays on top of other content */
}
</style>
<nav class="bg-primary-100  text-white hidden lg:block sticky-navbar" role="navigation">
  <ul class="flex items-center"> <!-- Use flex to align items in a row -->
    <li class="inline-block">
      <a href="<?= site_url() ?>" class="inline-block py-3 px-4 hover:bg-primary-200"><i class="fa fa-home"></i></a>
    </li>
    <?php if (menu_tema()) : ?>
      <?php foreach (menu_tema() as $menu) : ?>
        <?php $has_dropdown = count($menu['childrens'] ?? []) > 0; ?>
        <li class="inline-block relative" <?php $has_dropdown and print('x-data="{dropdown: false}"') ?>>
          <?php $menu_link = $has_dropdown ? '#!' : $menu['link_url']; ?>
          <a href="<?= $menu_link ?>"
            class="p-3 inline-block hover:bg-primary-200" 
            @mouseover="dropdown = true"
            @mouseleave="dropdown = false"
            @click="dropdown = !dropdown"
            <?php $has_dropdown and print('aria-expanded="false" aria-haspopup="true"'); ?>>
            <?= $menu['nama'] ?>
            <?php if ($has_dropdown) : ?>
              <i class="fas fa-chevron-down text-xs ml-1 inline-block transition duration-300" :class="{'transform rotate-180': dropdown}"></i>
            <?php endif; ?>
          </a>
          <?php if ($has_dropdown) : ?>
            <ul
              class="absolute top-full width-full bg-white text-gray-700 shadow-lg invisible transform transition duration-200 origin-top"
              :class="{'opacity-0 invisible z-[-10] scale-y-50': !dropdown, 'opacity-100 visible z-[9999] scale-y-100': dropdown}"
              x-transition
              @mouseover="dropdown = true"
              @mouseleave="dropdown = false">
              <?php foreach ($menu['childrens'] as $childrens) : ?>
                <?php if ($childrens['childrens']) : ?>
                <li class="inline-block relative"><a href="<?= $childrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white"><?= $childrens['nama'] ?>
                <?php if ($has_dropdown) : ?>
                  <i class="fas fa-chevron-left text-xs ml-1 inline-block transition duration-300" :class="{'transform rotate-180': dropdown}"></i>
                <?php endif; ?>
                </a></li>
                  <?php foreach ($childrens['childrens'] as $bmenu) : ?>
                    <?php $bhas_dropdown = count($bmenu['childrens'] ?? []) > 0; ?>
                    <li class="inline-block relative" <?php $bhas_dropdown and print('x-data="{dropdown: false}"') ?>>
                      <?php $bmenu_link = $bhas_dropdown ? '#!' : $bmenu['link_url']; ?>
                      <a href="<?= $bmenu_link ?>"
                        class="p-3 inline-block hover:bg-primary-200"
                        @mouseover="dropdown = true"
                        @mouseleave="dropdown = false"
                        @click="dropdown = !dropdown"
                        <?php $bhas_dropdown and print('aria-expanded="false" aria-haspopup="true"'); ?>>
                        <?= $bmenu['nama'] ?>
                        <?php if ($bhas_dropdown) : ?>
                          <i class="fas fa-chevron-down text-xs ml-1 inline-block transition duration-300" :class="{'transform rotate-180': dropdown}"></i>
                        <?php endif; ?>
                      </a>
                      <?php if ($bhas_dropdown) : ?>
                        <ul
                          class="absolute top-full width-full bg-white text-gray-700 shadow-lg invisible transform transition duration-200 origin-top"
                          :class="{'opacity-0 invisible z-[-10] scale-y-50': !dropdown, 'opacity-100 visible z-[9999] scale-y-100': dropdown}"
                          x-transition
                          @mouseover="dropdown = true"
                          @mouseleave="dropdown = false">
                          <?php foreach ($bmenu['childrens'] as $bchildrens) : ?>
                            <li><a href="<?= $bchildrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white"><?= $bchildrens['nama'] ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                <?php else: ?>
                <li><a href="<?= $childrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white"><?= $childrens['nama'] ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
    <li class="inline-block nav-search"> <!-- Add the nav-search class here -->
      <div class="flex justify-end items-center h-full ">
        <form action="<?= site_url() ?>" role="form" class="relative w-50 my-1">
          <i class="fas fa-search absolute top-1/2 left-0 transform -translate-y-1/2 z-10 px-3 text-black"></i>
          <input type="text" name="cari" class="form-input px-10 w-full h-12 bg-white relative inline-block text-black" placeholder="Cari...">
        </form>
      </div>
    </li>
  </ul>
</nav>
