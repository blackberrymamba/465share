$(document).ready(function () {
	var isAdvancedUpload = function () {
		var div = document.createElement('div');
		return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window &&
			'FileReader' in window;
	}();
	/* Obsługa zamykanie okien modalnych */
	$('a[href="#close"]').on('click', function (e) {
		$(this).closest(".modal").toggleClass("active");
		return false;
	});
	/* Obsługa otwierania okna modalnego Upload */
	$("#UploadButton").on('click', function (e) {
		resetLabel();
		$('#upload-modal').addClass("active");
	});
	/* Obslug Drag and Drop */
	var $form = $('#UploadForm');
	var $input = $form.find('input[type="file"]'),
		$label = $form.find('label'),
		showFiles = function (files) {
			$label.text(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace(
				'{count}', files.length) : files[0].name);
		},
		resetLabel = function () {
			$label.html("<strong>Choose a file</strong><span class=\"dragdrop\"> or drag it here</span>.");
			$('#UploadProgress').css('visibility', 'hidden');
		}
	$input.on('change', function (e) {
		showFiles(e.target.files);
	});
	if (isAdvancedUpload) {
		$form.addClass('has-advanced-upload');
		var droppedFiles = false;

		$form.on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
				e.preventDefault();
				e.stopPropagation();
			})
			.on('dragover dragenter', function () {
				$form.addClass('is-dragover');
			})
			.on('dragleave dragend drop', function () {
				$form.removeClass('is-dragover');
			})
			.on('drop', function (e) {
				droppedFiles = e.originalEvent.dataTransfer.files;
				$form.find('input[type="file"]').prop('files', droppedFiles);
				showFiles(droppedFiles);
			});
	}
	/* Obsługa Uploadu */
	$('#UploadForm').ajaxForm({
		dataType: 'json',
		beforeSubmit: function () {
			console.log("Before submit");
			$(this).addClass('loading');
			$("#UploadInfo").html('').attr('class', '').addClass("alert");
			$('#UploadProgress').attr('value', 0);
			$('#UploadProgress').css('visibility', 'visible');
		},
		uploadProgress: function (event, position, total, percentComplete) {
			$('#UploadProgress').attr('value', percentComplete);
		},
		success: function (json) {
			$('#UploadProgress').attr('value', 100);
			if (json.error) {
				$('#UploadInfo').html(json.error).css("display", "block").addClass("alert-error");
			} else if (json.url) {
				var html =
					"Download link: <br><input id='DownloadUrl' type='text' onfocus='SelectText(this)' class='form-input' value='" +
					json.url + "'/>";
				$('#UploadInfo').html(html).css("display", "block").addClass("alert-success");
				$vueFiles.fetchFiles();
			}
		},
		error: function (json) {
			$('#UploadInfo').html(json.error).css("display", "block").addClass("alert-error");
		}
	});
	$("input[type='text']").on("click", function () {
		$(this).select();
	});

});

function SelectText(elem) {
	$(elem).select();
}
