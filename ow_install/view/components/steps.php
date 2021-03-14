<div class="row">
    <?php $iteration = 1;
    $progress = 0;
    foreach($_assign_vars['steps'] as $step) { 
        if($step['active']) {
            $progress = $step['progress'];
        }
        if($iteration == 1 ) $class = 'borderright';
                else if ( $iteration == count($_assign_vars['steps']) ) $class = 'borderleft';
                else $class = 'borderleft borderright';
                $iteration ++;
        ?>
        <div class="col-lg-<?php echo $step['size']; ?> text-center p-1"> 
	    <span class="item <?php echo $step['active'] ? 'font-weight-bold' : 'text-muted"'; ?>">
	        <?php echo $step['label']; ?>
            </span>
        </div>
    <?php } ?>
    <div class="col-lg-12 p-2">
        <div class="progress">
            <div class="progress-bar" style="width: <?php echo $progress; ?>%;" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>