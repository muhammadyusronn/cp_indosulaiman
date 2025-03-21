<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"><?= $title ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fa fa-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item"><?= $title ?></li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><?= $title ?></div>
            </div>
            <div class="ibox-body">
                <p class="form-inline mx-sm-3 mb-2">Tanggal Mendaftar</p>
                <form class="form-inline mb-4" method="GET" action="<?= base_url('peserta') ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="date" value="<?= (isset($_GET['start_date'])) ? $_GET['start_date'] : date('Y-m-d'); ?>" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="date" value="<?= (isset($_GET['end_date'])) ? $_GET['end_date'] : date('Y-m-d'); ?>" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                    </div>
                    <div class="input-group">
                        <input type="submit" value="SEARCH" class="btn btn-primary mb-2">
                        <?php if (isset($_GET['start_date'])) { ?>
                            <a class="btn btn-success mb-2 ml-2" title="REFRESH" href="<?= base_url('peserta') ?>"><i class="fa fa-refresh"></i></a>
                        <?php } ?>
                    </div>

                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="transaction-table" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Register</th>
                                <th>Foto</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Email</th>
                                <th>Nomor Handphone</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>Tinggi Badan</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Sumber Informasi</th>
                                <th>Alamat</th>
                                <th>Sosial Media</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($peserta as $i) :
                                $no = 1;
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $i->registered_at ?></td>
                                    <td><img src="<?= (isset($peserta) &&  $i->file_pas_foto!='') ? base_url('uploads/peserta/' . $i->nik . '/' . $i->file_pas_foto) : base_url('assets/img/no-img.png') ?>" class="img-fluid rounded" alt="Pas Foto"></td>
                                    <td><?= $i->nik ?></td>
                                    <td><?= $i->nama ?></td>
                                    <td><?= $i->jenis_kelamin ?></td>
                                    <td><?= $i->agama_text ?></td>
                                    <td><?= $i->email ?></td>
                                    <td><?= $i->no_hp ?></td>
                                    <td><?= $i->tempat_lahir ?></td>
                                    <td><?= $i->tanggal_lahir ?></td>
                                    <td><?= $i->usia ?></td>
                                    <td><?= $i->tinggi_badan ?></td>
                                    <td><?= $i->pendidikan_terakhir_text ?></td>
                                    <td><?= $i->sumber_informasi_text ?></td>
                                    <td><?= $i->alamat ?></td>
                                    <td><?= $i->sosial_media ?></td>
                                    <td>
                                        <span class="<?= ($i->is_verified=="1") ? "btn btn-xs btn-success": "btn btn-xs btn-danger" ?>"><?= ($i->is_verified=="1") ? "VERIFIED": "NOT VERIFIED" ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" title="ACTION" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-list"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('peserta/detail?act=detail&id='.$i->id) ?>">DETAIL</a>
                                            <!-- <a class="dropdown-item" href="<?= base_url('peserta/detail?act=edit&id='.$i->id) ?>">EDIT</a>
                                            <a class="dropdown-item" href="<?= base_url('peserta/resendemail?nama='.$i->nama."&nik=".$i->nik."&email=".$i->email) ?>">RESEND EMAIL</a> -->
                                            <a class="dropdown-item" href="<?= base_url('peserta/hapus?id='.$i->id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak bisa dibatalkan')">HAPUS</a>
                                                <a class="dropdown-item" href="https://wa.me/<?= $i->no_hp; ?>" target="_blank">CHAT PESERTA</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>
                                <th>Register</th>
                                <th>Foto</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Email</th>
                                <th>Nomor Handphone</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>Tinggi Badan</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Sumber Informasi</th>
                                <th>Alamat</th>
                                <th>Sosial Media</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#start_date').on('input', function(e) {
            $('#end_date').val($('#start_date').val())
        });
    </script>