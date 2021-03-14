<div class="row">
    <div class="col-lg-12">
        <?php echo __('Thank you for installation Oxwall Plus!'); ?><br />
        <?php echo __('Congratulations! Oxwall Plus is now installed and you can use all features our script. Good luck!'); ?><br />
        <br />
        <?php echo __('Create a cron job that runs <b>ow_cron/run.php</b> once a minute'); ?><br /><br />
        <code><samp>wget -q -O /dev/null http://www.yoursite.com/ow_cron/run.php</samp></code>
        <br /><br />
        <?php echo __('or'); ?><br /><br />
        <code><samp>lynx http://www.yoursite.com/ow_cron/run.php</samp></code>
        <br /><br />
        <?php echo __('or'); ?><br /><br />
        <code><samp>curl http://www.yoursite.com/ow_cron/run.php</samp></code>
        <br /><br />
        <a href="<?php echo OW::getRouter()->urlForRoute('delete'); ?>" role="button" class="btn btn-block btn-lg btn-primary"><?php echo __('Go to main site'); ?></a>
    </div>
</div>