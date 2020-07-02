$(document).ready(function () {
	let no = 1;
	let total_fix = 0;
	let total_semua = [0];
	let kode_transaksi = $('#kode_transaksi').val();
	let jumlah_pesanan = 1;
	$('#tambah_pemesanan').click(function () {
		total_semua.push(0);
		jumlah_pesanan += 1;
		// kode_transaksi[14] = 2;
		// console.log(kode_transaksi)
		// console.log(kode_transaksi[14])
		$('#kode_transaksi').val(kode_transaksi.replace(/.$/, jumlah_pesanan));
		$.ajax({
			url: base_url() + 'produk/semua_produk/',
			type: 'GET',
			dataType: 'JSON',
			success: function (response) {
				produk = ''
				response.produk.map((data) => {
					produk += '<option value="' + data.id + '">' + data.kode + '</option>';
				});
				let pemesanan = `
					<div class="card mt-3">
						<div class="card-body">
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Kode Barang</label>
								<select required class="form-control col-sm-10 kode_barang" data-no='` + no + `' name="kode_barang[]" id="kode_barang` + no + `">
									<option value="" hidden>Kode Barang</option>
									` + produk + `
									</select>
							</div>
							<div class="form-group row">
								<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
								<div class="col-sm-10">
									<input  readonly type="text" class="form-control-plaintext nama_barang" name="nama_barang[]" id="nama_barang` + no + `" placeholder="">
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_barang" class="col-sm-2 col-form-label">Harga Satuan</label>
								<div class="col-sm-10">
									<input readonly type="number" class="form-control-plaintext harga_satuan" name="harga_satuan[]" id="harga_satuan` + no + `" placeholder="">
								</div>
							</div>
							<div class="form-group row">
								<label for="jumlah_unit" class="col-sm-2 col-form-label">Jumlah Unit</label>
								<div class="col-sm-5">
									<input required type="number" class="form-control jumlah_unit" data-no="` + no + `" name="jumlah_unit[]" id="jumlah_unit` + no + `" placeholder="">
								</div>
							</div>
							<div class="form-group row">
								<label for="total_produk" class="col-sm-2 col-form-label">Total</label>
								<div class="col-sm-5">
									<input readonly type="number" class="form-control-plaintext" name="total_produk[]" id="total_produk` + no + `" placeholder="">
								</div>
							</div>
						</div>
					</div>`;
				$('#detail-pesanan').append(pemesanan);
				no++;
			}
		});
	});


	$(document).on('change', '.kode_barang', function () {
		// $('html .kode_barang').change(function () {
		let kode = $(this).val();
		let nobarang = $(this).data('no');
		console.log(kode);
		$.ajax({
			url: base_url() + 'produk/data_produk/' + kode,
			type: 'GET',
			dataType: 'JSON',
			success: function (response) {
				console.log(response);
				$('html #nama_barang' + nobarang).val(response.produk.nama);
				$('html #harga_satuan' + nobarang).val(response.produk.harga);
			}
		});
	});


	$(document).on('keyup', '.jumlah_unit', function () {
		let nounit = $(this).data('no');
		let total = parseInt($('#harga_satuan' + nounit).val());
		let jumlah = parseInt($(this).val());
		let sebelumnya = total_semua[nounit];
		let j1 = isNaN(jumlah) ? 0 : jumlah
		total_semua[nounit] = total * j1;
		total_fix = total_fix + total_semua[nounit] - sebelumnya;
		$('#total_produk' + nounit).val(total_semua[nounit]);
		$('#total_bayar').val(total_fix);
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
