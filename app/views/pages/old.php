<?php echo do_shortcode('[header]'); ?>
<section class="old-browsers-bg"></section>
<section class="old-browsers-block">

    <div class="pindrop-logo"></div>
    <div class="seem">You seem to be using an unsupported browser</div>
    <div class="get">To get the most out of using the new Return Path please login to the new experience with a supported browser.</div>
    <div class="variants">
        <a href="https://www.microsoft.com/en-us/download/details.aspx?id=48126"><img src="<?php echo $ie ?>" alt="Internet Explorer"/></a>
        <a href="https://www.google.com/chrome/browser/desktop/"><img src="<?php echo $cr ?>" alt="Chrome"/></a>
        <a href="https://www.mozilla.org/en-US/firefox/new/"><img src="<?php echo $ff ?>" alt="Mozilla Firefox"/></a>
        <a href="https://support.apple.com/downloads/safari"><img src="<?php echo $sf ?>" alt="Safari"/></a>
    </div>

</section>
<?php echo do_shortcode('[footer]');
