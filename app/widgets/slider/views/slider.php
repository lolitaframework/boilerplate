<?php echo $args['before_widget']; ?>
<div class="widget slider">
<?php if (is_array($instance['slides'])) : ?>
    <?php foreach ($instance['slides'] as $slide) : ?>
        <div class="slider__item">
            <div class="slider__item__txt1">
                <p><?php echo $slide['subtitle'] ?></p>
                <p><?php echo $slide['title'] ?></p>
            </div>
            <div class="slider__item__txt2">
                <?php echo $slide['content'] ?>
            </div>
            <a class="slider__item__btn" href="<?php echo $slide['link'] ?>">
                <i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Get a demo
            </a>
        </div>
    <?php endforeach ?>
<?php endif; ?>
</div>
<?php echo $args['after_widget']; ?>