$(document).ready(function () {

	$('.save').click(function () {
		let csrfName = $('#txt_csrfname').data('name');
		let csrfHash = $('#txt_csrfname').data('token');
		let pelamar = $('#row-' + $(this).data('no') + ' .pelamar').val();
		let c4 = $('#row-' + $(this).data('no') + ' .C4').val();
		let c5 = $('#row-' + $(this).data('no') + ' .C5').val();
		let c6 = $('#row-' + $(this).data('no') + ' .C6').val();
		let c7 = $('#row-' + $(this).data('no') + ' .C7').val();
		let ht = $('#save-' + $(this).data('no'));
		$.ajax({
			url: base_url() + 'hrd/simpan_penilain/',
			type: 'POST',
			dataType: 'JSON',
			data: {
				[csrfName]: csrfHash,
				pelamar: pelamar,
				c4: c4,
				c5: c5,
				c6: c6,
				c7: c7,
			},
			beforeSend: function () {
				ht.html('Loading...');
			},
			success: function (response) {
				// setTimeout(function () {
				ht.html('Simpan');
				$('#txt_csrfname').data('token', response.token);
				if (response.status) {
					$('#save-content').html('<div class="alert alert-success" role="alert">Berhasil Meyimpan Data!</div>')
					$('#save-status').modal('show');
				}
				// }, 2000);
			}
		});
	});



	function base_url() {
		var pathparts = location.pathname.split('/');
		if (location.host == 'localhost') {
			var url = location.origin + '/' + pathparts[1].trim('/') + '/';
		} else {
			var url = location.origin;
		}
		return url;
	}
});
