$(document).ready(function () {
	$('#kode').change(function () {
		let produk = $(this).val();
		$.ajax({
			url: base_url() + 'bahanbaku/data_bahanbaku/' + produk,
			type: 'GET',
			dataType: 'JSON',
			success: function (response) {
				$('#id_barang').val(response.bahanbaku.id);
				$('#nama').val(response.bahanbaku.nama);
				$('#harga').val(response.bahanbaku.harga);
			}
		});
	});

	$('#save').click(function () {
		let nomer = $('#nomer').val();
		let id = $('#id_barang').val();
		let kode = $('#kode').val();
		let nama = $('#nama').val();
		let satuan = $('#satuan').val();
		let jumlah = $('#jumlah').val();
		let harga = $('#harga').val();
		let total = parseInt(harga * jumlah);
		$.ajax({
			url: base_url() + 'permintaan/belanja/',
			type: 'POST',
			dataType: 'JSON',
			data: {
				nomer: nomer,
				bahanbaku: id,
				satuan: satuan,
				jumlah: jumlah,
			},
			success: function (response) {
				console.log(response);
				if (response.status) {
					$('#kontent').append(`<tr><td>` + kode + `</td><td>` + nama + `</td><td>` + satuan + `</td><td>` + jumlah + `</td><td>` + convertToRupiah(harga) + `</td><td>` + convertToRupiah(total) + `</td></tr>`);
					$('#data-input').append(`
					<input type="hidden" name="id_barang[]" value="` + id + `">
					<input type="hidden" name="kode_barang[]" value="` + kode + `">
					<input type="hidden" name="nama_barang[]" value="` + nama + `">
					<input type="hidden" name="satuan_barang[]" value="` + satuan + `">
					<input type="hidden" name="jumlah_barang[]" value="` + jumlah + `">
					<input type="hidden" name="harga[]" value="` + harga + `">
					<input type="hidden" name="total[]" value="` + total + `">
					`)
					$('#kode').val('');
					$('#nama').val('');
					$('#satuan').val('');
					$('#jumlah').val('');
				} else {

				}
			}
		});
	});

	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

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
