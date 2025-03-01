<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/frontend/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Checkout</h1>
                <p class="breadcrumbs"><span class="mr-2">Checkout</span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card mt-4 mb-4">
                    <div class="card-body table-responsive">
                        <table class="table table-striped mt-5 mb-10 align-items-stretch">
                            <thead>
                                <tr>
                                    <td>Menu</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($this->cart->contents() as $items) :
                                ?>
                                    <tr>
                                        <td><?= $items['name']; ?></td>
                                        <td><?= $items['qty']; ?></td>
                                        <td><?= $this->cart->format_number($items['price']); ?></td>
                                        <td><?= $this->cart->format_number($items['subtotal']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        TOTAL
                                    </td>
                                    <td><?= $this->cart->format_number($this->cart->total()); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="h4 mb-2 mb-md-5 font-weight-bold">DETAIL</h2>
                        <form action="<?= base_url('do_transaction') ?>" method="POST">
                            <div class="form-group">
                                <label>Table Number</label>
                                <input type="text" id="table_number" name="table_number" value="<?= $table ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>No. Whatsapp (62821xxxxxxx)</label>
                                <input type="text" name="no_telf" value="628" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select class="form-control" name="payment_method">
                                    <option selected disabled>Please select payment method</option>
                                    <?php foreach ($payment_method as $i): ?>
                                        <option value="<?= $i->id_metode ?>"><?= $i->metode ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="submitButton" type="submit" value="CHECKOUT" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>