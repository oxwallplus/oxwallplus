<?php if($_assign_vars['action'] == 'chmod') { ?>
    <table class="table table-bordered table-dark table-striped table-hover">
      <thead>
        <tr>
          <th class="col-8" scope="col"><?php echo __('Directory'); ?></th>
          <th class="text-center" scope="col"><?php echo __('Required chmod'); ?></th>
          <th class="text-center" scope="col"><?php echo __('Current chmod'); ?></th>
        </tr>
      </thead>
      <tbody>
            <?php 
            foreach($_assign_vars['dirs'] as $dir) {
                echo '<tr class="'.($dir['chmod'] != '0777' ? 'bg-danger' : 'bg-success').'">
                    <th scope="row">'.$dir['dir'].'</th>
                    <td class="text-center">0777</td>
                    <td class="text-center">'.$dir['chmod'].'</td>
                </tr>';
          } ?>
      </tbody>
    </table>
    <br />
    <?php if(empty($_assign_vars['errors'])) {
    ?>
    <a href="<?php echo OW::getRouter()->urlForRoute("install-action", array('action' => 'db')); ?>" role="button" class="btn btn-block btn-lg btn-primary"><?php echo __('Continue'); ?></a>
    <?php } else { 
        echo '<div class="alert alert-danger" role="alert">
            '.__('Please check above errors before you can proceed with Oxwall Plus installation.').'
        </div>';
        echo '<a href="'.OW::getRouter()->urlForRoute("install").'" role="button" class="btn btn-block btn-lg btn-primary">'.__('Refresh').'</a>';
    }
} 
if($_assign_vars['action'] == 'config') {
    echo '<div class="alert alert-danger" role="alert">
        '.__('Please copy and paste this code replacing the existing one into <b>ow_includes/config.php</b> file.').'<br />
        '.__('Make sure you do not have any whitespace before and after the code.').'
    </div>';
    echo '<div class="form-group">
        <textarea class="form-control" onclick="this.select(); id="code" rows="10">'.$_assign_vars['configContent'].'</textarea>
    </div>';
    echo '<a href="'.OW::getRouter()->urlForRoute('plugins').'" role="button" class="btn btn-block btn-lg btn-primary">'.__('I saved config file and want install datatables').'</a>';
}
if($_assign_vars['action'] == 'db') { ?>
    <table class="table table-bordered table-dark table-striped table-hover">
      <thead>
        <tr>
          <th class="col-8" scope="col"><?php echo __('Table'); ?></th>
          <th class="text-center" scope="col"><?php echo __('Status'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if(isset($_assign_vars['tables'])) {
            foreach($_assign_vars['tables'] as $table) {
                echo '<tr class="'.($table['error'] ? 'bg-danger' : 'bg-success').'">
                    <th scope="row">'.$table['name'].'</th>
                    <td class="text-center">'.$table['status'].'</td>
                </tr>';
            }
        } ?>
      </tbody>
    </table>
    <br />
    <?php if(empty($_assign_vars['error'])) {
    ?>
    <a href="<?php echo OW::getRouter()->urlForRoute("install-action", array('action' => 'config')); ?>" role="button" class="btn btn-block btn-lg btn-primary"><?php echo __('Continue'); ?></a>
    <?php } else { 
        echo '<div class="alert alert-danger" role="alert">
            '.__('Please check above errors before you can proceed with Oxwall Plus installation.').'
        </div>';
        echo '<a href="'.OW::getRouter()->urlForRoute("install-action", array('action' => 'db')).'" role="button" class="btn btn-block btn-lg btn-primary">'.__('Refresh').'</a>';
    }
} 