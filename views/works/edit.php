

<form action="index.php?controller=works&action=update&id=<?php echo $work->id; ?>" method = "POST">

	<div class="form-group">
		<label for="exampleInputEmail1">Name work</label>
		<input class="form-control" type="text" name="name" id="name" placeholder="Tên công việc" required value="<?php echo $work->name; ?>">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Detail work</label>
		
		<textarea class="form-control" name="detail" id="detail" cols="30" rows="10"><?php echo $work->detail; ?></textarea>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Start date : <?php echo $work->start_date; ?></label>
		<div class='input-group date' id='datetimepicker3'>
			<input type="text" name="sdate" id="sdate" class="form-control" value="<?php echo $work->start_date; ?>" required >
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>

	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">End date : <?php echo $work->end_date; ?></label>
		<div class='input-group date' id='datetimepicker4'>
			<input class="form-control" type="text" name="edate" id="edate" value="<?php echo $work->end_date; ?>" required >
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>

	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Work Status</label>
		<select name="status" id="status" class="form-control">
			<option value="planning" <?php if ($work->status == 'planning') echo 'selected'; ?>>Planning</option>
			<option value="doing" <?php if ($work->status == 'doing') echo 'selected'; ?>>Doing</option>
			<option value="complete" <?php if ($work->status == 'complete') echo 'selected'; ?>>Complete</option>
			<option value="cancel" <?php if ($work->status == 'cancel') echo 'selected'; ?>>Cancel</option>
			<option value="fail" <?php if ($work->status == 'fail') echo 'selected'; ?>>Fail</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Save changes</button>
	<a href="index.php?controller=works&action=delete&id=<?php echo $work->id; ?>" class="btn btn-warning">Delete work</a>
</form>