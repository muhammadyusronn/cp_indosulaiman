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
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Peserta</div>
                <div class="ibox-tools">
                    <a href="<?= base_url('peserta') ?>" class="btn btn-info btn-sm text-white"><i class="fa fa-arrow-left"></i> BACK</a>
                </div>
            </div>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-admin" novalidate="novalidate">
                    <div class="form-group row">
                        <img src="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_pas_foto) : '' ?>" class="img-fluid rounded ml-8" style="max-width: 4cm;" alt="Product 1">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->nama : '' ?>" name="nama" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->nik : '' ?>" name="nik" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->email : '' ?>" name="email" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->no_hp : '' ?>" name="no_hp" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->tempat_lahir : '' ?>" name="tempat_lahir" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->tanggal_lahir : '' ?>" name="tanggal_lahir" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="<?= isset($peserta) ? $peserta[0]->usia : '' ?>" name="usia" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tinggi Badan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="<?= isset($peserta) ? $peserta[0]->tinggi_badan : '' ?>" name="tinggi_badan" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->pendidikan_terakhir : '' ?>" name="pendidikan_terakhir" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->alamat : '' ?>" name="alamat" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sumber Informasi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->sumber_informasi : '' ?>" name="sumber_informasi" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Dokumen Peserta</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Jenis Dokumen</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kartu Tanda Penduduk</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_ktp) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_kk) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Ijazah Terakhir</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_ijazah_terakhir) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                        <tr>
                            <td>CV</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_cv) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                        <tr>
                            <td>SKCK</td>
                            <td>
                                <?php if(isset($peserta) && $peserta[0]->file_skck!= ""){ ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_skck) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php }else{ ?> 
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_npwp) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIS</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_kis) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                        <tr>
                            <td>BPJS</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_bpjs) : '' ?>" target="_blank">DONWLOAD</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>