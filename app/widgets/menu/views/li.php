<?php if ($li->me->menu_item_parent <= 0) : ?>
    <?php $li_class = 'w-menu__item'; ?>
    <?php $a_class = 'w-menu__link' ?>
<?php else : ?>
    <?php $li_class = 'w-menu__sub-menu-item'; ?>
    <?php $a_class = 'w-menu__sub-menu-link' ?>
<?php endif ?>
<?php if ($li->hasSubmenu()) : ?>
    <?php $li_class.= ' w-menu__item--has_submenu'; ?>
<?php endif ?>

<li class="<?php echo $li_class ?>">
    <a href="<?php echo $li->me->url ?>" class="<?php echo $a_class ?> <?php echo implode(' ', $li->me->classes) ?>"><?php echo $li->me->title ?></a>
    <?php if ($li->hasSubmenu()) : ?>
        <?php echo $li->menu->ul($li->getSubItems()) ?>
    <?php endif ?>
</li>
