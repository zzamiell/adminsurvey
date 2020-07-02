$(document).ready(function () {
	$('#kode').change(function () {
		let produk = $(this).val();
		console.log(produk);
		$.ajax({
			url: base_url() + 'produk/data_produk/' + produk,
			type: 'GET',
			dataType: 'JSON',
			success: function (response) {
				$('#id_barang').val(response.produk.id);
				$('#nama').val(response.produk.nama)
				$('#jenis').val(response.produk.jenis)
				// console.log(response);
			}
		});
	});

	$('#save').click(function () {
		let nomer = $('#nomer').val();
		let id = $('#id_barang').val();
		let kode = $('#kode').val();
		let nama = $('#nama').val();
		let jenis = $('#jenis').val();
		let satuan = $('#satuan').val();
		let jumlah = $('#jumlah').val();
		$.ajax({
			url: base_url() + 'permintaan/produksi/',
			type: 'POST',
			dataType: 'JSON',
			data: {
				nomer: nomer,
				id_produk: id,
				satuan: satuan,
				jumlah: jumlah,
			},
			success: function (response) {
				// console.log(response);
				if (response.status) {
					$('#kontent').append(`<tr><td>` + kode + `</td><td>` + nama + `</td><td>` + jenis + `</td><td>` + satuan + `</td><td>` + jumlah + `</td></tr>`);
					$('#data-input').append(`<input type="hidden" name="id_barang[]" value="` + id + `">
					<input type="hidden" name="kode_barang[]" value="` + kode + `">
					<input type="hidden" name="nama_barang[]" value="` + nama + `">
					<input type="hidden" name="jenis_barang[]" value="` + jenis + `">
					<input type="hidden" name="satuan_barang[]" value="` + satuan + `">
					<input type="hidden" name="jumlah_barang[]" value="` + jumlah + `">`)
					$('#kode').val('');
					$('#nama').val('');
					$('#jenis').val('');
					$('#satuan').val('');
					$('#jumlah').val('');
				} else {

				}
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
