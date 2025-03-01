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
                <div class="ibox-title"><?= 'Upload Galeri' ?></div>
            </div>
            <div class="ibox-body">
                <form class="form-inline" method="POST" enctype="multipart/form-data" action="<?= base_url('galeri/create') ?>">
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="sr-only">File Galeri</label>
                        <input type="file" class="form-control" name="file_foto">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" name="name" placeholder="Judul">
                    </div>
                    <div class="form-group mx-sm-4 mb-2">
                        <select class="form-control" name="filter" >
                            <option selected disabled>Pilih Kategori</option>
                            <option value="filter-internal">Kegiatan Internal</option>
                            <option value="filter-eksternal">Kegiatan Eksternal</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mb-2">
                </form>
            </div>
        </div>
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><?= $title ?></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Galeri</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Galeri</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($galeri as $i) : ?>
                            <tr>
                                <td>
                                    <img class="img-fluid" src="<?= base_url('uploads/galeri/').$i->file; ?>" style="max-width:250px">
                                </td>
                                <td><?= $i->name ?></td>
                                <td><?= ($i->filter == "filter-internal") ? "Kegiatan Internal" : "Kegiatan Eksternal" ?></td>
                                <td>
                                    <a href="<?= base_url('backend/GaleriController/destroy/') . $i->id ?>" class="btn btn-danger" title="HAPUS" onclick="javascript: return confirm('anda yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>