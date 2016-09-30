<?php echo $args['before_widget']; ?>
<?php if ($instance['img']) : ?>
    <a href="<?php echo $instance['url']; ?>">
        <?php echo wp_get_attachment_image($instance['img'], 'full'); ?>
        <?php if ($instance['title']) : ?>
            <span class="title"><?php echo $instance['title'] ?></span>
        <?php endif ?>
    </a>
<?php endif ?>
<?php echo $args['after_widget']; ?>