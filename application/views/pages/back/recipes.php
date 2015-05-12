<div class="flex-row-center styled-heading-wrap cms-heading-wrap">
    <span class="left"></span><h1 class='center styled-heading '>Recipes</h1><span class="right"></span>
</div>

<div class="col-xs-10 flex-row-stretch">
    <section id='recipes-list' class='list-admin col-xs-4'>
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
    <section id='recipes-content' class='content-admin col-xs-8'>
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
                    <div class="col-xs-12">
                        
                    <button type="submit" class="primary-button" name='submit' value='add'>Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='clearfix'></div>
    </section>
</div>

