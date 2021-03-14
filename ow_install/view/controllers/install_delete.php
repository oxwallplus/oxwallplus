<div class="row">
    <div class="col-lg-12">
        <?php echo __('Thank you for installation Oxwall Plus!'); ?><br />
        <?php echo __('Congratulations! Oxwall Plus is now installed and you can use all features our script. Good luck!'); ?><br />
        <br />
        <?php
        echo '<div class="alert alert-danger" role="alert">
            '.__('Please remove <b>ow_install/</b> folder and refresh this page').'
        </div>';
        echo '<a href="'.$_assign_vars['siteurl'].'" role="button" class="btn btn-block btn-lg btn-primary">'.__('Remove folder manually and continue').'</a>';
        ?>
    </div>
</div>