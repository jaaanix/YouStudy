<?php include "header.tpl"; ?>
<?php
$round = 1;
$images = array();
while (file_exists ("images/kino$round.jpg")) {
    $images[] = "\"images/kino{$round}.jpg\"";
    $round++;
}
        ?>
        <script type="text/javascript">
            $(function () {
                var tmp = new imageGalery();
                tmp.SetImages([<?php echo implode(",",$images) ?>]);
            });
        </script>
        <div id="lightbox">
        <div id="lightboxupper">
            <div id="lightboxleftarrow"><i class="fa fa-arrow-circle-left"></i></div>
            <div id="lightboximagecontainer">
                <img class="fakeimage">

                <div class="realimage"></div>
                <div id="lightboxloadoverlay">
                    <div class="bg"></div>
                    <div id="lightboxspinner"></div>
                </div>
            </div>
            <div id="lightboxrightarrow"><i class="fa fa-arrow-circle-right"></i></div>
        </div>
        <div id="lightboxlower">
            <div id="lightboxrailleftarrow" class="lightboxrailarrow"><i class="fa fa-arrow-left fa-2"></i></div>
            <div id="lightboxrail">
                <div class="lightboxthumb">
                    <div class="image">
                    </div>
                </div>
            </div>
            <div id="lightboxrailrightarrow" class="lightboxrailarrow"><i class="fa fa-arrow-right fa-2"></i></div>
        </div>
        <!--
        <div id="lightboxexit"><div class="icon"><i class="fa fa-times"></i></div><div class="text"> Ansicht schlie&szlig;en  </div></div>
        -->
    </div>


<?php include "footer.tpl"; ?>