<?php echo $args['before_widget']; ?>
<?php if ('' !== $instance['title']) : ?>
    <?php echo $args['before_title'] . $instance['title'] . $args['after_title'] ?>
<?php endif ?>
<?php if (count($instance['collection'])) : ?>
    <ul>
    <?php foreach ($instance['collection'] as $icon) : ?>
        <li class="lf_interface_social_networks__item">
            <a href="<?php echo $icon['url']; ?>" target="__blank"><i class="<?php echo $icon[ 'icon_css' ]; ?>"></i><?php echo $icon['content'] ?></a>
        </li>
    <?php endforeach ?>
    </ul>
<?php endif ?>
<?php echo $args['after_widget']; ?>
