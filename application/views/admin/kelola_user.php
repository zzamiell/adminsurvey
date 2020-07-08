<!-- Begin Page Content -->
<div class="container-fluid body">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1> -->

     <div class="row">
          <div class="col-lg p-3">
               <?= $this->session->flashdata('message'); ?>
               <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewMenuModal">Tambah User</a>

               <table class="table table-hover">
                    <thead>
                         <tr align="center">
                              <th scope="col">No</th>
                              <th scope="col">Username</th>
                              <th scope="col">Email</th>
                              <th scope="col">Nama Lengkap</th>
                              <th scope="col">Level</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1; ?>
                         <?php foreach ($user as $u) : ?>
                              <tr align="center">
                                   <td><?= $no++ ?></td>
                                   <td><?= $u->username; ?></td>
                                   <td><?= $u->email; ?></td>
                                   <td><?= $u->first_name . ' ' . $u->last_name; ?></td>
                                   <td><?= $u->level; ?></td>
                                   <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#edit-pegawai<?= $u->id_user ?>" class="badge badge-info">Edit</a>
                                        <a class="badge badge-danger text-white" href="<?= base_url('jenis/hapus/' . $u->id_user); ?>">Hapus</a>
                                   </td>
                              </tr>


                              <!-- Modal Ubah -->
                              <div aria-hidden="true" aria-labelledby="edit-pegawaiLabel" role="dialog" tabindex="-1" id="edit-pegawai<?= $u->id_user; ?>" class="modal fade">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h4 class="modal-title">Edit Jenis</h4>
                                                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                             </div>
                                             <?= form_open('editJenis/' . $u->id_user); ?>
                                             <div class="modal-body">

                                                  <div class="form-group">
                                                       <input name="jenis" class="form-control" value="<?= $u->jenis; ?>" required>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <input class="btn btn-info" type="submit" value="Simpan"></input>
                                                       <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                                  </div>
                                                  <?= form_close(); ?>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <!-- END Modal Ubah -->
                         <?php endforeach; ?>
                    </tbody>
               </table>

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

                    <?= form_open('tambahUser'); ?>
                    <div class="modal-body">

                         <div class="form-group">
                              <input type="text" name="username" class="form-control" placeholder="Username User" required>
                         </div>

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
                              <input type="password" name="password_old" class="form-control" placeholder="Password User" required>
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
                    <?= form_close(); ?>
               </div>
          </div>
     </div>
</div>
<!-- End of Main Content -->