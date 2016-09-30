<?php if ($level <= 0) : ?>
    <?php $ul_class = 'w-menu__container'; ?>
<?php else : ?>
    <?php $ul_class = 'w-menu__sub-menu'; ?>
<?php endif ?>
<ul class="<?php echo $ul_class ?>">
    <?php foreach ($ul as $el) : ?>
        <?php echo $el->render() ?>
    <?php endforeach ?>
</ul>