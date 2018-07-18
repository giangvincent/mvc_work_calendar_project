<div class="container">
	<div class="row well">
		<?php echo $work->name; ?>
	</div>
	<div class="row">
		<pre><?php echo $work->detail; ?></pre>
		
	</div>
	<div class="row well">
		<div class="col-xs-12">
			<div class="col-xs-6">Start date</div>
			<div class="col-xs-6">End date</div>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-6"><?php echo $work->start_date; ?></div>
			<div class="col-xs-6"><?php echo $work->end_date; ?></div>
		</div>
	</div>
		
	<div class="row">
		Status : <?php echo ucfirst($work->status); ?>
	</div>
	<div class="row text-center">
		<a href="index.php?controller=works&action=edit&id=<?php echo $work->id; ?>" class="btn btn-info">Edit work</a>
		<a href="index.php?controller=works&action=delete&id=<?php echo $work->id; ?>" class="btn btn-warning">Delete work</a>
	</div>
</div>