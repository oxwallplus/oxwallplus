<table class="table table-bordered table-dark table-striped table-hover">
  <thead>
    <tr>
      <th class="col-8" scope="col"><?php echo __('Requirement'); ?></th>
      <th class="text-center" scope="col"><?php echo __('Min. value'); ?></th>
      <th class="text-center" scope="col"><?php echo __('Your value'); ?></th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($_assign_vars['requirements'] as $requirement) {
            echo '<tr class="'.($requirement['error'] ? 'bg-danger' : 'bg-success').'">
                <th scope="row">'.$requirement['label'].'</th>
                <td class="text-center">'.$requirement['min'].'</td>
                <td class="text-center">'.$requirement['current'].'</td>
            </tr>';
      } ?>
  </tbody>
</table>
<br />
<?php if(empty($_assign_vars['errors'])) {
    echo __('Congratulations you can install Oxwall Plus on your server!');
?>
<br /><br />
<a href="<?php echo OW::getRouter()->urlForRoute("site"); ?>" role="button" class="btn btn-block btn-lg btn-primary"><?php echo __('Continue'); ?></a>
<?php } else { 
    echo '<div class="alert alert-danger" role="alert">
        '.__('Please correct above errors before you can proceed with Oxwall Plus installation.').'
    </div>';
    echo '<a href="'.OW::getRouter()->urlForRoute("requirements").'" role="button" class="btn btn-block btn-lg btn-primary">'.__('Refresh').'</a>';
}