<div class="container">
	<div class="columns">
		<div class="column col-sm-12 col-md-8 col-xl-6 col-mx-auto text-center">
			<h2>
				<?php echo (isset($FILE_NAME) ? $FILE_NAME : ''); ?>
			</h2>
			<?php echo (isset($ERROR) ? "<h3>$ERROR</h3>" : ''); ?>
			<?php if(!isset($ERROR)){ ?>
			<div style="text-align:center;">
				<a href="?force" class="btn btn-primary">Download</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
