<form method="post">
<div class="row">
    <?php if(!empty($_assign_vars['errors'])) {
        echo '<div class="col-lg-12"><div class="alert alert-danger" role="alert">
            '.__('Please correct below errors before you can proceed with Oxwall Plus installation.').'
        </div></div>';
    } ?>
    <div class="col-lg-6">
        <h4><?php echo __('Site settings'); ?></h4>
        <div class="form-group row">
            <label for="site_title" class="col-sm-3 col-form-label"><?php echo __('Site title'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['site_title']) ? 'is-inavlid' : 'is-valid'; ?>" name="site_title" id="site_title" value="<?php echo @$_assign_vars['data']['site_title']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="site_tagline" class="col-sm-3 col-form-label"><?php echo __('Site tagline'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['site_tagline']) ? 'is-inavlid' : 'is-valid'; ?>" name="site_tagline" id="site_tagline" value="<?php echo @$_assign_vars['data']['site_tagline']; ?>">
              <small class="form-text text-muted"><?php echo __('Catchy one-stringed site description (optional)'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="site_url" class="col-sm-3 col-form-label"><?php echo __('Site url'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['site_url']) ? 'is-inavlid' : 'is-valid'; ?>" name="site_url" id="site_url" value="<?php echo @$_assign_vars['data']['site_url']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="site_path" class="col-sm-3 col-form-label"><?php echo __('Site path'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['site_path']) ? 'is-inavlid' : 'is-valid'; ?>" name="site_path" id="site_path" value="<?php echo @$_assign_vars['data']['site_path']; ?>">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <h4><?php echo __('Administrator account'); ?></h4>
        <div class="form-group row">
            <label for="admin_email" class="col-sm-4 col-form-label"><?php echo __('Admin e-mail'); ?></label>
            <div class="col-sm-8">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['admin_email']) ? 'is-inavlid' : 'is-valid'; ?>" name="admin_email" id="admin_email" value="<?php echo @$_assign_vars['data']['admin_email']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="admin_username" class="col-sm-4 col-form-label"><?php echo __('Admin username'); ?></label>
            <div class="col-sm-8">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['admin_username']) ? 'is-inavlid' : 'is-valid'; ?>" name="admin_username" id="admin_username" value="<?php echo @$_assign_vars['data']['admin_username']; ?>">
              <small class="form-text text-muted"><?php echo __('Letters and digits only'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="admin_password" class="col-sm-4 col-form-label"><?php echo __('Admin password'); ?></label>
            <div class="col-sm-8">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['admin_password']) ? 'is-inavlid' : 'is-valid'; ?>" name="admin_password" id="admin_password" value="<?php echo @$_assign_vars['data']['admin_password']; ?>">
              <small class="form-text text-muted"><?php echo __('From 2 to 12 characters'); ?></small>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-block btn-lg btn-primary"><?php echo __('Continue'); ?></button>
</div>
</form>