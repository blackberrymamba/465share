<div class="container">
<div class="columns">
	<div class="column col-sm-12 col-md-8 col-xl-6 col-mx-auto">

		<h1>
			<?php echo lang('edit_group_heading');?>
		</h1>
		<p>
			<?php echo lang('edit_group_subheading');?>
		</p>

		<div id="infoMessage">
			<?php echo $message;?>
		</div>

		<?php echo form_open(current_url());?>

		<div class="form-group">
			<?php echo lang('edit_group_name_label', 'group_name', array('class'=>'form-label'));?>
			<?php echo form_input(array_merge($group_name, array('class'=>'form-input')));?>
		</div>

		<div class="form-group">
			<?php echo lang('edit_group_desc_label', 'description', array('class'=>'form-label'));?>
			<?php echo form_input(array_merge($group_description, array('class'=>'form-input')));?>
		</div>

		<div class="form-group">
			<?php echo form_submit('submit', lang('edit_group_submit_btn'), array('class'=>'btn btn-primary'));?>
		</div>

		<?php echo form_close();?>
	</div>
</div>
</div>