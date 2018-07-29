<div class="container">
	<div class="columns">
		<div class="column col-10">
			<h1>Files</h1>
		</div>
		<div class="column col-2">

			<button id="UploadButton" class="btn btn-action btn-primary circle float-right">
				<i class="icon icon-plus"></i>
			</button>
		</div>
	</div>

	<div id="uploadContainer" class="columns">
		<div class="modal" id="upload-modal">
			<a href="#close" class="modal-overlay" aria-label="Close"></a>
			<div class="modal-container">
				<div class="modal-header">
					<a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
					<div class="modal-title h5">File upload</div>
				</div>
				<div class="modal-body">
					<div class="content">
						<?php echo form_open_multipart('api/do_upload', array('id' => "UploadForm")); ?>
						<h1>
							<i class="icon icon-4x icon-upload"></i>
						</h1>
						<div class="form-group">
							<input class="box__file" type="file" name="files" id="file" data-multiple-caption="{count} files selected" style="display:none"
							/>
							<!--files[] multiple -->
							<label for="file" style="padding: 3em;">
								<strong>Choose a file</strong>
								<span class="dragdrop"> or drag it here</span>.
							</label>

						</div>
						<button class="btn btn-primary" type="submit">Upload</button>
						<progress id="UploadProgress" class="progress" value="25" max="100"></progress>
						<div id="UploadInfo"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="filesContainer" class="columns">
		<div class="column col-sm-12 col-12">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Filename</th>
						<th>Uploaded</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="file in files">
						<td>{{ file.FILE_NAME }}</td>
						<td>{{ file.UPLOADED_TIME }}</td>
						<td>
							<div class="dropdown">
								<div class="btn-group">
									<a v-bind:href="file.DOWNLOAD_LINK" class="btn">Download</a>
									<a href="#" class="btn dropdown-toggle" tabindex="0">
										<i class="icon icon-caret"></i>
									</a>
									<ul class="menu">
										<li class="menu-item">
											<a href="#" v-on:click="deleteItem(file)">Delete</a>
										</li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>