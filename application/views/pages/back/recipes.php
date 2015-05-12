<div class='cms-heading-wrap'>
    <h1>Recipes</h1>
</div>

<section id='recipes-list' class='list-admin'>
    <ul class="nav nav-stacked">
        <li class='active'><a href='#new' data-toggle='pill' > Add &nbsp;&nbsp;<i class='fa fa-plus'></i></a></li>
        <?php
        foreach ($recipes as $recipe) {
            echo '<li><a id="recipe-' . $recipe->getId() . '" href="#recipe-target-' . $recipe->getId() . '" role="tab" data-toggle="pill" onclick="generateContentPanel(' . $recipe->getId() . ', \'recipe\', \'.outer\');">' . $recipe->getName() . "</a></li>";
        }
        ?>
    </ul>
    <div class='clearfix'></div>
</section>
<section id='recipes-content' class='content-admin'>
    <div class="tab-content outer">
        <div class="tab-pane active" id="new">
            <form method="post" enctype="multipart/form-data">
                <div class='form-group col-xs-12'>
                    <label for='name' class='control-label sr-only'></label>
                    <input name='name' type="text" class="form-control input-lg" placeholder='Name'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='title' class='control-label sr-only'></label>
                    <input name='title' type="text" class="form-control input-lg" placeholder='Image Title'>
                </div>
                <div class='form-group col-xs-6'>
                    <label for='image'>Image:</label>
                    <input name='image' type="file">
                </div>
                <div class='form-group col-xs-6'>
                    <label for='file' >PDF: </label>
                    <input name='file' type="file" >
                </div>
                <div class='form-group col-xs-12'>
                    <label for='description' class='control-label sr-only'></label>
                    <textarea name='description' type="text" rows='5' class="form-control input-lg"></textarea>
                </div>
                <button type="submit" class="primary-button" name='submit' value='add'><h4>Save</h4></button>
            </form>
        </div>
    </div>
    <div class='clearfix'></div>
</section>

