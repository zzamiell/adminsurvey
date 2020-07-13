const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Data Fasilitas',
        text: 'Berhasil' + flashData,
        type: 'success'
    });
}