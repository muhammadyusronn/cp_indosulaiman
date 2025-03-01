<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/frontend/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Cart</h1>
                <p class="breadcrumbs"> <span>Cart <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-lg-12 ">
                <?php if ($this->cart->total() < 1) { ?>
                    <div class="alert alert-danger alert-dismissible mt-4 fade show" role="alert">
                        <strong>Halo!</strong> There is nothing in your cart!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="card mb-4 mt-4">
                    <div class="card-body table-responsive">
                        <table class="table table-striped align-items-stretch">
                            <tr>
                                <td>Menu</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Total</td>
                                <td></td>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($this->cart->contents() as $items) :
                            ?>
                                <tr>
                                    <td><?= $items['name']; ?></td>
                                    <td><?= $items['qty']; ?></td>
                                    <td><?= $this->cart->format_number($items['price']); ?></td>
                                    <td><?= $this->cart->format_number($items['subtotal']); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-list"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url('cart-delete?rowid=') . $items['rowid'] ?>">Delete</a>
                                                <a class="dropdown-item" href="<?= base_url('menu-detail-page?rowid=') . $items['rowid'] ?>&act=update">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan=2 class="text-right">
                                    <?php if ($this->cart->total() > 0) { ?>
                                        <a href="<?= base_url('checkout-page'); ?>" class=" btn btn-success">PAYMENT</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('menu-page'); ?>" class=" btn btn-warning">Back To Menu</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    TOTAL
                                </td>
                                <td><?= $this->cart->format_number($this->cart->total()); ?></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>