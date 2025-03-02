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
                <div class="ibox-title">Detail Order</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($detail as $i) : 
                        $total = $total + ($i->harga * $i->jumlah);
                        ?>
                            <tr>
                                <td><?= $i->nama_produk; ?></td>
                                <td><?= $i->jumlah; ?></td>
                                <td><?= rupiah($i->harga); ?></td>
                                <td><?= rupiah($i->harga * $i->jumlah); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">TOTAL</th>
                            <th><?= rupiah($total); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="page-content fade-in-up">
    <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Pemesan</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <form class="form-horizontal" id="form-admin" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Pembeli</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($transaction) ? $transaction[0]->nama_pembeli : '' ?>" name="nama_pembeli" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Meja</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($transaction) ? $transaction[0]->nomor_meja : '' ?>" name="nomor_meja" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($transaction) ? $transaction[0]->nomor_hp : '' ?>" name="nomor_hp" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Metode Bayar</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="level" disabled>
                                <option disabled>Pilih Metode Bayar</option>
                                <?php foreach ($payment_method as $i) { ?>
                                    <option value="<?= $i->id_metode ?>"><?= $i->metode ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total Bayar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?= isset($transaction) ? rupiah($transaction[0]->total) : '' ?>" name="total" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Order</label>
                        <div class="col-sm-3">
                            <input class="form-control text-center bg-<?= ($transaction[0]->status == "1") ? 'danger' : (($transaction[0]->status=="2") ? 'warning' : 'success') ?> text-white" type="text" value="<?= isset($transaction) ? $transaction[0]->nama_status : '' ?>" name="total" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Pembayaran</label>
                        <div class="col-sm-3">
                            <?= ($transaction[0]->is_lunas == '1') ? '<a class="btn btn-xs btn-success text-white">LUNAS</a>' : '<a href="'.base_url('transaction/paid?id=').$transaction[0]->id_transaksi.'" class="btn btn-sm btn-danger text-white">BELUM BAYAR</a>' ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <a href="<?= base_url('transaction') ?>" class="btn btn-info btn-sm text-white"><i class="fa fa-arrow-left"></i> BACK</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>