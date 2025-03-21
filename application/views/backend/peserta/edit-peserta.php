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
                <?php echo $this->session->flashdata('msg'); ?>
                <form id="contact-form" action="<?= base_url('peserta/edit/submit') ?>" method="post" role="form">
                    <div class="form-group row">
                        <img src="<?= (isset($peserta) &&  $peserta[0]->file_pas_foto != '') ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_pas_foto) : base_url('assets/img/no-img.png') ?>" class="img-fluid rounded ml-8" style="max-width: 4cm;" alt="Pas Foto">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input class="form-control" type="hidden" value="<?= isset($peserta) ? $peserta[0]->id : '' ?>" name="id" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->nama : '' ?>" name="nama" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <?php if ($_GET['act'] == "detail") { ?>
                                <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->jenis_kelamin : '' ?>" name="jenis_kelamin" readonly>
                            <?php } else { ?>
                                <select class="form-control form-control-subject" name="jenis_kelamin" id="jenis_kelamin" placeholder="" required>
                                    <option value="Laki-laki" <?= ($peserta[0]->jenis_kelamin=="Laki-laki") ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= ($peserta[0]->jenis_kelamin=="Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <?php if ($_GET['act'] == "detail") { ?>
                                <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->agama_text : '' ?>" name="agama" readonly>
                            <?php } else { ?>
                                <select class="form-control form-control-subject" name="agama" id="agama" placeholder="" required>
                                    <?php foreach ($agama as $i): ?>
                                        <option value="<?= $i->id ?>" <?= ($i->id==$peserta[0]->agama)?'selected':'' ?> ><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->nik : '' ?>" name="nik" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->email : '' ?>" name="email" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->no_hp : '' ?>" name="whatsapp" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->tempat_lahir : '' ?>" name="tempat_lahir" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->tanggal_lahir : '' ?>" name="tanggal_lahir" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="<?= isset($peserta) ? $peserta[0]->usia : '' ?>" name="usia" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tinggi Badan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" value="<?= isset($peserta) ? $peserta[0]->tinggi_badan : '' ?>" name="tinggi_badan" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                        <div class="col-sm-10">
                        <?php if ($_GET['act'] == "detail") { ?>
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->pendidikan_terakhir_text : '' ?>" name="pendidikan_terakhir" readonly>
                            <?php } else { ?>
                                <select class="form-control form-control-subject" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="" required>
                                    <?php foreach ($pendidikan_terakhir as $i): ?>
                                        <option <?= ($i->id==$peserta[0]->pendidikan_terakhir)?'selected':'' ?> value="<?= $i->id ?>"><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->alamat : '' ?>" name="alamat" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sumber Informasi</label>
                        <div class="col-sm-10">
                        <?php if ($_GET['act'] == "detail") { ?>
                                <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->sumber_informasi_text : '' ?>" name="sosial_media" readonly>
                            <?php } else { ?>
                                <select class="form-control form-control-subject" name="sumber_informasi" id="sumber_informasi" placeholder="" required>
                                    <?php foreach ($sumber_informasi as $i): ?>
                                        <option value="<?= $i->id ?>" <?= ($i->id == $peserta[0]->sumber_informasi) ? 'selected' : '' ?>><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sosial Media</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($peserta) ? $peserta[0]->sosial_media : '' ?>" name="sosial_media" <?= ($_GET['act'] == "detail") ? 'readonly' : 'required' ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Peserta</label>
                        <div class="col-sm-10">
                            <?php if ($_GET['act'] == "detail") { ?>
                                <span class="<?= ($peserta[0]->is_verified=="1") ? "btn btn-xs btn-success": "btn btn-xs btn-danger" ?>"><?= ($peserta[0]->is_verified=="1") ? "VERIFIED": "NOT VERIFIED" ?></span>
                            <?php } else { ?>
                                <select class="form-control form-control-subject" name="is_verified" id="is_verified" placeholder="" required>
                                    <option value="1" <?= ($peserta[0]->is_verified=="1") ? 'selected' : '' ?>>Verfied</option>
                                    <option value="0" <?= ($peserta[0]->is_verified=="0") ? 'selected' : '' ?>>Non-Verified</option>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($_GET['act'] == "edit") { ?>
                    <div class="text-right"><br>
                        <button class="btn btn-primary solid blank" type="submit">SUBMIT</button>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
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
                            <th>Act</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pas Foto</td>
                            <td>
                                <img src="<?= (isset($peserta) &&  $peserta[0]->file_pas_foto != '') ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_pas_foto) : base_url('assets/img/no-img.png') ?>" class="img-fluid rounded ml-8" style="max-width: 4cm;" alt="Pas Foto">
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="pas_foto">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu Tanda Penduduk</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_ktp != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_ktp) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="ktp">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_kk != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_kk) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="kk">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ijazah Terakhir</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_ijazah_terakhir != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_ijazah_terakhir) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="ijazah">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>CV</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_cv != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_cv) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="cv">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>SKCK</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_skck != "") { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_skck) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="skck">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_npwp != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_npwp) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="npwp">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>KIS</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_kis != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_kis) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="kis">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>BPJS</td>
                            <td>
                                <?php if (isset($peserta) && $peserta[0]->file_bpjs != '') { ?>
                                    <a class="btn btn-xs btn-info" href="<?= isset($peserta) ? base_url('uploads/peserta/' . $peserta[0]->nik . '/' . $peserta[0]->file_bpjs) : '' ?>" target="_blank">DONWLOAD</a>
                                <?php } else { ?>
                                    <span class="btn btn-xs btn-danger">NO FILE UPLOADED</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if (isset($peserta)) { ?>
                                    <button type="button" class="btn btn-primary btn-xs btn-edit"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-id="<?= (isset($peserta)) ? $peserta[0]->id : '' ?>"
                                        data-nik="<?= (isset($peserta)) ? $peserta[0]->nik : '' ?>"
                                        data-filetype="bpjs">
                                        EDIT
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT DOKUMEN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="<?= base_url('peserta/edit-dokumen') ?>" id="form-admin" novalidate="novalidate" enctype="multipart/form-data" method="post">
                        <input type="hidden" class="form-control" name="id" id="id" readonly>
                        <input type="hidden" class="form-control" name="file_type" id="file_type" readonly>
                        <input type="hidden" class="form-control" name="nik" id="nik" readonly>
                        <div class="form-group form-modal div-pas_foto row">
                            <label class="col-sm-2 col-form-label">Pas Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_pas_foto" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                        <div class="form-group form-modal div-ktp row">
                            <label class="col-sm-2 col-form-label">File KTP</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_ktp" accept=".jpg, .jpeg, .png, .pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-kk row">
                            <label class="col-sm-2 col-form-label">File KK</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_kk" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-ijazah row">
                            <label class="col-sm-2 col-form-label">Ijazah Terakhir</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_ijazah_terakhir" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-cv row">
                            <label class="col-sm-2 col-form-label">File CV</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_cv" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-skck row">
                            <label class="col-sm-2 col-form-label">File SKCK</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_skck" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-npwp file-npwp row">
                            <label class="col-sm-2 col-form-label">File NPWP</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_npwp" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-kis file-kis row">
                            <label class="col-sm-2 col-form-label">File KIS</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_kis" accept="application/pdf">
                            </div>
                        </div>
                        <div class="form-group form-modal div-bpjs file-bpjs row">
                            <label class="col-sm-2 col-form-label">File BPJS</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_bpjs" accept="application/pdf">
                            </div>
                        </div>
                        <hr>
                        <div class="text-right"><br>
                            <button class="btn btn-primary solid blank" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // A $( document ).ready() block.
        $(document).ready(function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Get the ID from data-id attribute
                var file_type = button.data('filetype'); // Get the ID from data-id attribute
                var nik = button.data('nik'); // Get the ID from data-id attribute
                $("#file_type").val(file_type)
                $("#nik").val(nik)
                $("#id").val(id)

                // Hide all file upload fields first
                $('.form-modal').hide();

                // Show only the corresponding file upload field
                $('.div-' + file_type).show();
            });
        });
    </script>