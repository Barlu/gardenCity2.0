<div class='content-wrap flex-column container-fluid' id='shop'>
    <div class='heading-wrap'>
        <div class='paper-texture'>
            <div class='heading-image'>
                <img src='<?php echo base_url(); ?>assets/images/our-community.jpg' class="box-shadow"/>
                <h1 class='heading'>Our Community</h1>
            </div>
        </div>
    </div>
    <div class="paper-texture">
        <div class="white-background box-shadow padding-large">
            
            <article class="padding-large">
                <div class="flex-row-center styled-heading-wrap">
                        <span class="left"></span><h1 class='center styled-heading '>Newsletters</h1><span class="right"></span>
                    </div>
                <p class="padding">
                    Fusce sit amet turpis tempus, tempor massa eget, facilisis urna.  Donec tempus bibendum quam non facilisis. Fusce semper eros id orci tempus mattis. Morbi mollis condimentum semper. Fusce molestie non est accumsan consectetur. Praesent pretium nulla ac tempus ullamcorper. Fusce sit amet turpis tempus, tempor massa eget, facilisis urna. Aenean pulvinar ex in tortor pellentesque, ut tincidunt tellus porta. Aenean pulvinar ex in tortor pellentesque, ut tincidunt tellus porta.usce lacus nunc, egestas in fermentum a, finibus eget metus. Suspendisse potenti.
                </p>
                <div class="divider"></div>
                <div class="clear"></div>
            </article>
            
            <div id="newsletter-wrap" class="flex-row">
            </div>
            
        </div>
    </div>
    <script>
        $(function () {
            if ($(window).width() <= 830) {
                $('#newsletter-wrap').load(base_url + 'ajax/getNewsletters/accordian');
            } else {
                $('#newsletter-wrap').load(base_url + 'ajax/getNewsletters/tabs');
            }
        })
    </script>
</div>
