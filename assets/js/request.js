$(document).ready(function () {
	$('#id_bagian').change(function () {
		$.ajax({
			url: base_url() + 'kepala/getData/permintaan',
			type: 'GET',
			dataType: 'JSON',
			data: {
				id: $(this).val(),
			},
			success: function (response) {
				console.log(response);
				$('#id_jabatan option').remove();
				$('#id_jabatan').append('<option value="" hidden>Pilih Jabatan</option>');
				response.map((data) => {
					$('#id_jabatan').append(`<option value="` + data.id_jabatan + `">` + data.jabatan + `</option>`)
				});
			}
		});
	});

	function base_url() {
		var pathparts = location.pathname.split('/');
		if (location.host == 'localhost') {
			var url = location.origin + '/' + pathparts[1].trim('/') + '/'; // http://localhost/myproject/
		} else {
			var url = location.origin; // http://stackoverflow.com
		}
		return url;
	}
});
