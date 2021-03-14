<div class="dropdown float-right">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="selectLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="famfamfam-flag-<?php echo $_assign_vars['current']; ?>"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="selectLanguage">
      <?php foreach($_assign_vars['langs'] as $key) { 
          echo '<a class="dropdown-item" href="?language='.$key.'"><i class="famfamfam-flag-'.$key.'"></i></a>';
      } ?>
  </div>
</div>