<div class="flex-row-center styled-heading-wrap cms-heading-wrap" style="width: 470px; margin: auto; padding-left: 100px;">
    <span class="left"></span><h1 class='center styled-heading '>Products</h1><span class="right"></span>
</div>

<div role="tabpanel" id='product-tab-panel'>

    <ul class="nav nav-tabs" id="product-nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#bags" aria-controls="bags" role="tab" data-toggle="tab">Bags</a></li>
        <li role="presentation"><a href="#produce" aria-controls="produce" role="tab" data-toggle="tab">Produce</a></li>
    </ul>


    <div class="admin tab-content">
        <div class="tab-pane fade in active" id="bags">
            <div class='container-fluid admin-product-wrap'>
                <?php $this->load->view('partials/manage/products/bags'); ?>
            </div>
        </div>
        <div class="tab-pane fade" id="produce">
            <div class='container-fluid admin-product-wrap'>
                <?php $this->load->view('partials/manage/products/produce'); ?>
            </div>
        </div>

    </div>
</div>

