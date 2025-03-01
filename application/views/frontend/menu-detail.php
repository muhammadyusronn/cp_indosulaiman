<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/frontend/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Menu</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('home-page') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?= base_url('menu-page') ?>">Menu <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu Detail</span></p>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-wrap-about">
    <div class="container">
        <div class="row">
            <div class="col-md-7 d-flex">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php for($x=0; $x<COUNT($detail_produk); $x++): ?>
                        <div class="carousel-item <?= ($x=='0') ? 'active' : '' ?>">
                            <img class="d-block w-100 img img-3 ml-md-2" src="<?= base_url('assets/img/produk/').$produk[0]->id_produk.'/' . $detail_produk[$x]->file ?>" alt="First slide"> 
                        </div>
                        <?php endfor; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
               
            </div>
            <div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
                <div class="heading-section mb-4 my-5 my-md-0">
                    <h2 class="mb-4"><?= $produk[0]->nama_produk ?></h2>
                </div>
                <p><?= $produk[0]->deskripsi_produk ?></p>
                <pc class="time">
                    <form action="<?= base_url('cart-add') ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" value="<?= $produk[0]->id_produk ?>" name="id_produk" class="form-control" placeholder="ID">
                            <input type="hidden" name="harga_normal" value="<?= $produk[0]->harga_normal ?>" class="form-control" placeholder="Price">
                            <input type="hidden" name="nama_produk" value="<?= $produk[0]->nama_produk ?>" class="form-control" placeholder="Price" readonly>
                            <input type="hidden" name="code" value="<?= $produk[0]->code ?>" class="form-control" placeholder="Price" readonly>
                            <input type="hidden" name="rowid" value="<?= ($act == 'update') ? $rowId : '' ?>" class="form-control" placeholder="Row ID" readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga_normal_display" value="<?= rupiah1($produk[0]->harga_normal) ?>" class="form-control" placeholder="Price" readonly>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" id="qty" name="qty" value="<?= ($act == 'update') ? $qty : 0 ?>" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" onclick="checkQuantity()" value="ADD TO CART" class="btn btn-primary py-3 px-5">
                            <a href="<?= base_url('menu-page?cat=') . $produk[0]->code ?>" class="btn btn-warning py-3 px-5">Back to menu</a>
                        </div>
                    </form>
                    </p>
            </div>
        </div>
    </div>
</section>
<script>
    function checkQuantity(){
        var input = parseInt($('#qty').val());
        if (isNaN(input)) // this is the code I need to change
        {
            alert("Please input valid numbers");
            event.preventDefault()
        }

        if(input<= 0){
            alert("Quantitiy must more than 0");
            event.preventDefault()
        }
    }
</script>