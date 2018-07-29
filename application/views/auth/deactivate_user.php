<div class="container">
	<div class="columns">
		<div class="column col-sm-12 col-md-8 col-xl-6 col-mx-auto">
			<h1>
				<?php echo lang('deactivate_heading');?>
			</h1>
			<p>
				<?php echo sprintf(lang('deactivate_subheading'), $user->username);?>
			</p>

			<?php echo form_open("auth/deactivate/".$user->id);?>

				<div class="form-group">
					<label class="form-radio">
						<input type="radio" name="confirm" value="no" checked>
						<i class="form-icon"></i>
						<?php echo lang('deactivate_confirm_n_label');?>
					</label>
					<label class="form-radio">
						<input type="radio" name="confirm" value="yes">
						<i class="form-icon"></i>
						<?php echo lang('deactivate_confirm_y_label');?>
					</label>
				</div>

			<?php echo form_hidden($csrf); ?>
			<?php echo form_hidden(array('id'=>$user->id)); ?>

			<div class="form-group">
				<?php echo form_submit('submit', lang('deactivate_submit_btn'), array('class'=>'btn btn-primary'));?>
			</div>

			<?php echo form_close();?>
		</div>
	</div>
</div>
