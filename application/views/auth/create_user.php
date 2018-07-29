<div class="container">
	<div class="columns">
		<div class="column col-sm-12 col-md-8 col-xl-6 col-mx-auto">

			<h1>
				<?php echo lang('create_user_heading');?>
			</h1>
			<p>
				<?php echo lang('create_user_subheading');?>
			</p>

			<div id="infoMessage">
				<?php echo $message;?>
			</div>

			<?php echo form_open("auth/create_user");?>

			<div class="form-group">
				<?php echo lang('create_user_fname_label', 'first_name', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($first_name, array('class'=>'form-input')));?>
			</div>

			<div class="form-group">
				<?php echo lang('create_user_lname_label', 'last_name', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($last_name, array('class'=>'form-input')));?>
			</div>

			<?php
      if($identity_column!=='email') {
          echo '<div class="form-group">';
          echo lang('create_user_identity_label', 'identity', array('class'=>'form-label'));
          echo form_error('identity');
          echo form_input(array_merge($identity, array('class'=>'form-input')));
          echo '</div>';
      }
      ?>

				<div class="form-group">
					<?php echo lang('create_user_company_label', 'company', array('class'=>'form-label'));?>
					<?php echo form_input(array_merge($company, array('class'=>'form-input')));?>
				</div>

				<div class="form-group">
					<?php echo lang('create_user_email_label', 'email', array('class'=>'form-label'));?>
					<?php echo form_input(array_merge($email, array('class'=>'form-input')));?>
				</div>

				<div class="form-group">
					<?php echo lang('create_user_phone_label', 'phone', array('class'=>'form-label'));?>
					<?php echo form_input(array_merge($phone, array('class'=>'form-input')));?>
				</div>

				<div class="form-group">
					<?php echo lang('create_user_password_label', 'password', array('class'=>'form-label'));?>
					<?php echo form_input(array_merge($password, array('class'=>'form-input')));?>
				</div>

				<div class="form-group">
					<?php echo lang('create_user_password_confirm_label', 'password_confirm', array('class'=>'form-label'));?>
					<?php echo form_input(array_merge($password_confirm, array('class'=>'form-input')));?>
				</div>

				<div class="form-group">
					<?php echo form_submit('submit', lang('create_user_submit_btn'), array('class'=>'btn btn-primary'));?>
				</div>

				<?php echo form_close();?>
		</div>
	</div>
</div>
