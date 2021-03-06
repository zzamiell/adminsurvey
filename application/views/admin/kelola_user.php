<!-- Begin Page Content -->
<div class="container-fluid body">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1> -->

     <div class="row">
          <div class="col-lg p-3">
               <?= $this->session->flashdata('message'); ?>
               <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewMenuModal">Tambah User</a>
               <div class="table-responsive">
                    <table class="table table-hover myTable">
                         <thead>
                              <tr align="center">
                                   <th scope="col">No</th>
                                   <th scope="col">Email</th>
                                   <th scope="col">Nama Lengkap</th>
                                   <th scope="col">Level</th>
                                   <th scope="col">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1; ?>
                              <?php foreach ($user as $u) : ?>
                                   <tr align="center" id="delete<?= $u->id_user; ?>">
                                        <td><?= $no++ ?></td>
                                        <td><?= $u->email; ?></td>
                                        <td><?= $u->first_name . ' ' . $u->last_name; ?></td>
                                        <td>
                                             <?php if ($u->level == 'User') : ?>
                                                  <i class=" fas fa-fw fa-user">User</i>
                                             <?php else : ?>
                                                  <i class="fas fa-fw fa-user-lock">Admin</i>
                                             <?php endif; ?>
                                        </td>
                                        <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#edit-pegawai<?= $u->id_user ?>" class="badge badge-info">Edit</a>
                                             <!-- <a class="badge badge-danger text-white" href="<?= base_url('hapusUser/' . $u->id_user) ?>">Hapus</a> -->
                                             <a href="javascript:void(0);" onclick=deletedata(<?= $u->id_user ?>) class="badge badge-danger text-white">Hapus</a>
                                        </td>
                                   </tr>


                                   <!-- Modal Ubah -->
                                   <div aria-hidden="true" aria-labelledby="edit-pegawaiLabel" role="dialog" tabindex="-1" id="edit-pegawai<?= $u->id_user; ?>" class="modal fade">
                                        <div class="modal-dialog">
                                             <div class="modal-content">
                                                  <div class="modal-header">
                                                       <h4 class="modal-title">Edit User</h4>
                                                       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                  </div>
                                                  <form class="form-horizontal form-edit" action="<?php echo base_url('user/edit/' . $u->id_user) ?>" method="post" enctype="multipart/form-data" role="form">
                                                       <div class="modal-body">

                                                            <div class="form-group">
                                                                 <input type="email" name="email" class="form-control" placeholder="Email User" value="<?= $u->email; ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <input type="text" name="first_name" class="form-control" placeholder="Nama Depan" value="<?= $u->first_name; ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang" value="<?= $u->last_name; ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <input type="password" name="password_old" class="form-control" placeholder="Password User" value="<?= $u->password; ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <label>Level</label>
                                                                 <select name="id_level" class="form-control">
                                                                      <?php foreach ($level as $kat) : ?>
                                                                           <?php if ($kat->id_level === $u->id_level) :
                                                                                $select = 'selected';
                                                                           else :
                                                                                $select = '';
                                                                           endif; ?>
                                                                           <option <?= $select; ?> value="<?= $kat->id_level; ?>"><?= $kat->level; ?></option>
                                                                      <?php endforeach; ?>
                                                                 </select>
                                                            </div>

                                                            <div class="modal-footer">
                                                                 <input class="btn btn-info" type="submit" value="Simpan"></input>
                                                                 <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                                            </div>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>
               </div>
               <!-- END Modal Ubah -->
          <?php endforeach; ?>
          </tbody>
          </table>
          </div>
     </div>
     <!-- /.container-fluid -->

</div>

<!-- Modal Tambah-->
<div class="modal fade" id="NewMenuModal" tabindex="-1" role="dialog" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="NewMenuModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>

               <form method="post" id="form-tambah_user" action="<?= base_url('tambahUser') ?>">
                    <div class="modal-body">

                         <div class="form-group">
                              <input type="email" name="email" class="form-control" placeholder="Email User" required>
                         </div>

                         <div class="form-group">
                              <input type="text" name="first_name" class="form-control" placeholder="Nama Depan" required>
                         </div>

                         <div class="form-group">
                              <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang" required>
                         </div>

                         <div class="form-group">
                              <input type="password" name="password" class="form-control" placeholder="Password User" required>
                         </div>

                         <div class="form-group">
                              <select name="id_level" class="form-control" required>
                                   <option hidden>Pilih Level User</option>
                                   <?php foreach ($level as $bg) : ?>
                                        <option value="<?= $bg->id_level; ?>"><?= $bg->level; ?></option>
                                   <?php endforeach; ?>
                              </select>
                         </div>

                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Add</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>
<!-- End of Main Content -->

<script type="text/javascript">
     $(document).ready(function() {

          $('#form-tambah_user').submit(function(e) {
               e.preventDefault();
               var data = $('#form-tambah_user').serialize();
               //console.log(data);
               $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                         if (data.sukses == true) {
                              swal({
                                   title: 'Data user',
                                   text: data.msg,
                                   type: 'success'
                              }, function() {
                                   window.location.href = '<?php echo site_url('admin/kelola_user'); ?>';
                              });
                         } else {
                              swal({
                                   title: 'Data user',
                                   text: data.msg,
                                   type: 'warning'
                              });
                         }
                    }
               })
          });
     });
</script>

<script type="text/javascript">
     $(document).ready(function() {

          $('.form-edit').submit(function(e) {
               e.preventDefault();
               //   var data = $('#form-edit').serialize();
               var data = $(this).serialize();
               //console.log(data);
               $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                         if (data.sukses == true) {
                              swal({
                                   title: 'Data user',
                                   text: data.msg,
                                   type: 'success'
                              }, function() {
                                   window.location.href = '<?php echo site_url('admin/kelola_user'); ?>';
                              });
                         } else {
                              swal({
                                   title: 'Data user',
                                   text: data.msg,
                                   type: 'warning'
                              });
                         }
                    }
               })
          });
     });
</script>

<script>
     function deletedata(id) {
          swal({
                    title: "Apa anda yakin?",
                    text: "User yang sudah dihapus, tidak dapat dikembalikan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya, Saya yakin!",
                    closeOnConfirm: false
               },
               function(isConfirm) {
                    if (isConfirm) {
                         $.ajax({
                              url: "<?php echo base_url('user/hapus/' . $u->id_user) ?>",
                              type: "post",
                              data: {
                                   id: id,
                              },
                              success: function(data) {
                                   console.log(data);
                                   swal('User Berhasil Dihapus', ' ', 'success');
                                   $("#delete" + id).fadeTo("slow", 0.7, function() {
                                        $(this).remove();
                                   })

                              },
                              error: function() {
                                   swal('data gagal di hapus', 'error');
                              }
                         });
                    }
               });
     }
</script>