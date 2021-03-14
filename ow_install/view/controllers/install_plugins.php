<strong><?php __("We thought you'd also like to throw in some plugins while you're at it:"); ?></strong>
<br /><br />
<form method="post">
<table class="table table-bordered table-dark table-striped table-hover">
  <thead>
    <tr>
      <th scope="col"><?php echo __('Plugin'); ?></th>
      <th class="text-center" scope="col"><?php echo __('Description'); ?></th>
      <th class="text-center" scope="col"><?php echo __('Version'); ?></th>
      <th class="text-center" scope="col"><?php echo __('Install'); ?></th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($_assign_vars['plugins'] as $plugin) {
            echo '<tr class="'.($plugin['installed'] ? 'bg-success' : (in_array($plugin['plugin']['key'], $_assign_vars['errors']) ? 'bg-danger' : '')).'">
                <th scope="row">'.$plugin['plugin']['name'].'</th>
                <td>'.$plugin['plugin']['description'].'</td>
                <td class="text-center">'.$plugin['plugin']['build'].'</td>
                <td class="text-center">';
                if($plugin['installed']) {
                    echo __('INSTALLED');
                } else {
                    echo '<div class="form-check">
                        <input type="checkbox" name="plugins[]" '.($plugin['auto'] == 'auto' ? 'checked="checked"' : '').' value="'.$plugin['plugin']['key'].'" id="'.$plugin['plugin']['key'].'">
                    </div>';
                }
                echo '</td>
            </tr>';
      } ?>
  </tbody>
</table>
<br />
<?php if(!empty($_assign_vars['errors'])) {
    echo '<div class="alert alert-danger" role="alert">
        '.__('Occurred error when we try installed above plugin, please try again or uncheck this plugins.').'
    </div>';
}
?>
<br />
<button type="submit" class="btn btn-block btn-lg btn-primary"><?php echo __('Install selected plugins'); ?></button>