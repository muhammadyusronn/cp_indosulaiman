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
        <a href="<?= base_url('jenis-konten/create') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"><?= $title ?></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Jenis Konten</th>
                            <th>Deskripsi Konten</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Jenis Konten</th>
                            <th>Deskripsi Konten</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $default = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
                        foreach ($jenis_konten as $i) : ?>
                            <tr>
                                <td><?= $i->nama; ?></td>
                                <td><?= $i->deskripsi; ?></td>
                                <?php if (in_array($i->id, $default)) { ?>
                                    <td>
                                        <button class="btn btn-warning" title="EDIT" disabled><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger" title="HAPUS" disabled><i class="fa fa-trash"></i></button>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <a href="<?= base_url('jenis-konten/update/') . $i->id; ?>" class="btn btn-warning" title="EDIT"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url('backend/JenisKontenController/destroy/') . $i->id ?>" class="btn btn-danger" title="HAPUS" onclick="javascript: return confirm('anda yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>