<div class="modal fade" id="gallery-modal-<?php echo $gallery->getId(); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="<?php echo base_url(); ?>index.php/admin/images" method="post" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo $gallery->getName() ?></h4>
                </div>
                <div class="modal-body">
                    <div class='form-group col-xs-12'>
                        <label for='name' class='control-label sr-only'></label>
                        <input name='name' type="text" class="form-control input-lg" value="<?php echo $gallery->getName() ?>" placeholder='Name'>
                    </div>
                    <div class='form-group col-xs-12'>
                        <label for='description' class='control-label sr-only'></label>
                        <textarea name='description' type="text" rows='3' class="form-control input-lg"><?php echo $gallery->getDescription() ?></textarea>
                    </div>
                </div>
                <input type='hidden' name='id' value='<?php echo $gallery->getId() ?>'/>
                <input type='hidden' name='type' id='type' >
                
                <div class='clearfix'></div>
                <div class="modal-footer">
                    <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "editGallery", <?php echo $gallery->getId() ?>)'>Save</button>
                    <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "deleteGallery", <?php echo $gallery->getId() ?>)'>Delete</button>
                </div>

            </form>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

