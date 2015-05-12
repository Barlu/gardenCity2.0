<section id='produce-list' class='list-admin accordian product-nav'>
    <ul >
        <li class='active'><a href='#new-produce' data-toggle='pill' ><h3>Add &nbsp;&nbsp;<i class='fa fa-plus'></i></h3></a></li>
        <?php
        foreach ($produce as $product) {
            $data['product'] = $product;
            $this->load->view('partials/manage/products/produce_li', $data);
        }
        ?>
    </ul>
    <div class='clearfix'></div>
</section>
<section id='produce-content' class='content-admin'>
    <div class="tab-content outer">
        <div class="tab-pane active" id="new-produce">
            <form method="post" enctype="multipart/form-data" id="new-produce">
                <div class='form-group col-xs-12'>
                    <label for='name' class='control-label sr-only'>Name</label>
                    <input name='name' type="text" class="form-control input-lg" placeholder='Name'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='variety' class='control-label sr-only'>Variety</label>
                    <input name='variety' type="text" class="form-control input-lg" placeholder='Variety'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='title' class='control-label sr-only'>Image Title</label>
                    <input name='title' type="text" class="form-control input-lg" placeholder='Image Title'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='image'>Image:</label>
                    <input name='image' type="file">
                </div>
                <div class='form-group col-xs-12'>
                    <label for='description' class='control-label sr-only'>Description</label>
                    <textarea name='description' type="text" rows='5' class="form-control input-lg" placeholder='description'></textarea>
                </div>
                <div class="col-xs-12">
                    <button type="submit" class="primary-button" name='addProduce' value="true">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class='clearfix'></div>
</section>

