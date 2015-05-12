<div id="login-cart-wrap"  data-spy="affix" data-offset-top="100">
    <div id="login-cart" class="flex-row-stretch padding pull-right">
        <div id='login' class="flex-column">
            <?php if ($user): ?>
                <?php if ($user->getType() !== 'admin'): ?>
                    <?php $this->load->view('partials/account_link'); ?>
                <?php else: ?>
                    <?php $this->load->view('partials/admin-account_link'); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php $this->load->view('partials/login_link'); ?>
            <?php endif; ?>
        </div>
        <div id='cart' class="flex-column">
            <a href='<?php echo base_url() ?>our_food/order' class="flex-row">
                <i class="fa fa-shopping-cart"></i>
                <span class='primary'>(<?php echo $this->cart->total_items() ?>)</span>
            </a>
        </div>
    </div>
</div>
<?php $this->load->view('partials/registration'); ?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="primary">Log In</h1>

                </div>
                <div class="modal-body row">
                    <?php $this->load->view('partials/login') ?>
                    <div class='clearfix'></div>
                </div>
        </div>
    </div>
</div>