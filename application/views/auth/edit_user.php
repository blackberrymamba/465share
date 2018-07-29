<div class="container">
	<div class="columns">
		<div class="column col-sm-12 col-md-8 col-xl-6 col-mx-auto">

			<h1>
				<?php echo lang('edit_user_heading');?>
			</h1>
			<p>
				<?php echo lang('edit_user_subheading');?>
			</p>

			<div id="infoMessage">
				<?php echo $message;?>
			</div>

			<?php echo form_open(uri_string());?>

			<div class="form-group">
				<?php echo lang('edit_user_fname_label', 'first_name', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($first_name, array('class'=>'form-input')));?>
			</div>

			<div class="form-group">
				<?php echo lang('edit_user_lname_label', 'last_name', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($last_name, array('class'=>'form-input')));?>
			</div>

			<div class="form-group">
				<?php echo lang('edit_user_company_label', 'company', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($company, array('class'=>'form-input')));?>
			</div>

			<div class="form-group">
				<?php echo lang('edit_user_phone_label', 'phone', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($phone, array('class'=>'form-input')));?>
			</div>

			<div class="form-group">
				<?php echo lang('edit_user_password_label', 'password', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($password, array('class'=>'form-input')));?>
			</div>

			<div class="form-group">
				<?php echo lang('edit_user_password_confirm_label', 'password_confirm', array('class'=>'form-label'));?>
				<?php echo form_input(array_merge($password_confirm, array('class'=>'form-input')));?>
			</div>

			<?php if ($this->ion_auth->is_admin()): ?>

			<h3>
				<?php echo lang('edit_user_groups_heading');?>
			</h3>
			<?php foreach ($groups as $group):?>
			<?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
				<div class="form-group">
					<label class="form-switch">
						<input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo $checked;?>>
						<i class="form-icon"></i>
						<?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
					</label>
				</div>
				<?php endforeach?>

				<?php endif ?>

				<?php echo form_hidden('id', $user->id);?>
				<?php echo form_hidden($csrf); ?>

				<div class="form-group">
					<?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class'=>'btn btn-primary'));?>
				</div>

				<?php echo form_close();?>
		</div>
	</div>
</div>
