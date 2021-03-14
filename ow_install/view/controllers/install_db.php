<form method="post">
<div class="row">
    <div class="col-lg-12">
    <?php if(!empty($_assign_vars['errors'])) {
        echo '<div class="alert alert-danger" role="alert">
            '.__('Please correct below errors before you can proceed with Oxwall Plus installation.').'
            '.(isset($_assign_vars['errors']['message']) ? '<br />'.$_assign_vars['errors']['message'] : '').'
        </div>';
    } else { 
        echo '<div class="alert alert-info" role="alert">
            '.__('Please create a database and enter its details here.').'
        </div>';
    }
    ?></div>
    <div class="col-lg-12">
        <div class="form-group row">
            <label for="db_host" class="col-sm-3 col-form-label"><?php echo __('Database host'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['db_host']) ? 'is-inavlid' : 'is-valid'; ?>" name="db_host" id="db_host" value="<?php echo @$_assign_vars['data']['db_host']; ?>">
              <small class="form-text text-muted"><?php echo __('MySQL host and port (optionally). Example: <i>localhost</i> or <i>localhost:3307</i>'); ?></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="db_user" class="col-sm-3 col-form-label"><?php echo __('Database user'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['db_user']) ? 'is-inavlid' : 'is-valid'; ?>" name="db_user" id="db_user" value="<?php echo @$_assign_vars['data']['db_user']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="db_password" class="col-sm-3 col-form-label"><?php echo __('Database password'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['db_password']) ? 'is-inavlid' : 'is-valid'; ?>" name="db_password" id="db_password" value="<?php echo @$_assign_vars['data']['db_password']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="db_name" class="col-sm-3 col-form-label"><?php echo __('Database name'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['db_name']) ? 'is-inavlid' : 'is-valid'; ?>" name="db_name" id="db_name" value="<?php echo @$_assign_vars['data']['db_name']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="db_prefix" class="col-sm-3 col-form-label"><?php echo __('Table prefix'); ?></label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?php echo isset($_assign_vars['errors']['db_prefix']) ? 'is-inavlid' : 'is-valid'; ?>" name="db_prefix" id="db_prefix" value="<?php echo @$_assign_vars['data']['db_prefix']; ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-block btn-lg btn-primary"><?php echo __('Continue'); ?></button>
</div>
</form>
