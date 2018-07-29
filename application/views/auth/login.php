<div class="container">
<div class="columns">
	<div class="column col-sm-12 col-md-8 col-xl-6 col-lg-6 col-6 col-mx-auto">
		<div id="infoMessage">
			<?php echo $message;?>
		</div>

		<?php echo form_open("auth/login");?>

		<div class="form-group">
			<?php echo lang('login_identity_label', 'identity',array('class'=>'form-label'));?>
			<?php echo form_input($identity, null, array('class'=>'form-input'));?>
		</div>

		<div class="form-group">
			<?php echo lang('login_password_label', 'password',array('class'=>'form-label'));?>
			<?php echo form_input($password,  null, array('class'=>'form-input'));?>
		</div>

		<div class="form-group">
			<label class="form-switch">
				<input id="remember" name="remember" type="checkbox" value="1">
				<i class="form-icon"></i>
				<?php echo lang('login_remember_label');?>
			</label>
		</div>


		<?php echo form_submit('submit', lang('login_submit_btn'), array('class'=>'btn btn-primary', 'style'=>'float:right;'));?>


		<?php echo form_close();?>
	</div>
</div>
</div>