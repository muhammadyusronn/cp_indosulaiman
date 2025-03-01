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
    <div class="page-content fade-in-up col-lg-8">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Mohon untuk memasukkan data yang valid!</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <?php
                if (isset($artikel)) {
                    $url = base_url('artikel/update/' . $artikel[0]->id);
                } else {
                    $url = base_url('artikel/create');
                }
                ?>
                <form class="form-horizontal" id="form-artikel" method="post" action="<?= $url ?>" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" required value="<?= isset($artikel) ? $artikel[0]->judul : '' ?>" name="judul">
                            <input class="form-control" type="hidden" required value="<?= isset($artikel) ? $artikel[0]->id : '' ?>" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <textarea id="editor" class="form-control" name="isi"><?= isset($artikel) ? $artikel[0]->isi : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="file_foto">
                        </div>
                    </div>
                    <?php if (isset($artikel)) { ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="img-fluid" src="<?= base_url('uploads/file-artikel/') . $artikel[0]->file; ?>" style="max-width:250px">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_artikel" value="1" <?= ((isset($artikel)) && ($artikel[0]->jenis_artikel == "1")) ? "checked" : "checked" ?>>Berita
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_artikel" value="2" <?= ((isset($artikel)) && ($artikel[0]->jenis_artikel == "2")) ? "checked" : "" ?>>Pengumuman
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_published" value="1" <?= ((isset($artikel)) && ($artikel[0]->is_published == "1")) ? "checked" : "checked" ?>>Publish
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_published" value="0" <?= ((isset($artikel)) && ($artikel[0]->is_published == "0")) ? "checked" : "" ?>>Pending
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button class="btn btn-info" name="submit" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->