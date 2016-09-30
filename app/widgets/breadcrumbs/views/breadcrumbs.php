<?php echo $args['before_widget']; ?>
    <?php if ($crumbs) :
        $numItems = count($crumbs);
        $i = 0;
    ?>
        <div class="widget breadcrumbs main-download__header__breadcrumbs">
            &lt; <a href="\">Back to solutions</a> |
            <?php foreach ($crumbs as $crumb) : ?>
                <?php if (null === $crumb->getLink()) : ?>
                    <span href="#"><?php echo $crumb->getLabel() ?></span>
                <?php else : ?>
                    <a href="<?php echo $crumb->getLink() ?>"><?php echo $crumb->getLabel() ?></a>
                <?php endif ?>
                <?php if (++$i !== $numItems) : ?>
                    &nbsp;&gt;
                <?php endif; ?>
            <?php endforeach ?>
            <div class="btn-contact-us cu-jq">@ Contact us</div>
        </div>
    <?php endif ?>
<?php echo $args['after_widget']; ?>
