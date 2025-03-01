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
                <div class="ibox-title">Mohon untuk memasukkan data yang valid!</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <?php
                if (isset($jenis_konten)) {
                    $url = base_url('jenis-konten/update/' . $jenis_konten[0]->id);
                } else {
                    $url = base_url('jenis-konten/create');
                }
                ?>
                <form class="form-horizontal" id="form-level" method="post" action="<?= $url ?>" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Konten</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($jenis_konten) ? $jenis_konten[0]->nama : '' ?>" name="nama">
                            <input class="form-control" type="hidden" readonly value="<?= isset($jenis_konten) ? $jenis_konten[0]->id : '' ?>" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi Konten</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($jenis_konten) ? $jenis_konten[0]->deskripsi : '' ?>" name="deskripsi">
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