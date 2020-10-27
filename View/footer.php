</div>
</div>
</div>
<!-- Footer -->


<footer class="footer" >
    <div class="container-fluid">
    <div class="row text-xs-center">
        <div class="col-sm-8 text-sm-left mb-0-5 mb-sm-0">
            <?=date("Y") ?> © <?=NOMBRE_APLICATION.VERSION ?> <b id="Licencia"></b>
        </div>
        <div class="col-sm-4 text-sm-right">
            <ul class="nav nav-inline l-h-2">
                <li class="nav-item"><a class="nav-link text-black" href="#">Ayuda</a></li>
            </ul>
        </div>
    </div>
    </div>
</footer>

</div> <!-- BODY -->

</div>


<!-- ../vendor JS OLIVER-->
<script type="text/javascript" src="./vendor/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="./vendor/detectmobilebrowser/detectmobilebrowser.js"></script>

<script type="text/javascript" src="./vendor/js/select2.full.min.js"></script>

<script type="text/javascript" src="./vendor/jscrollpane/mwheelIntent.js"></script>
<script type="text/javascript" src="./vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="./vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
<script type="text/javascript" src="./vendor/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="./vendor/toastr/toastr.min.js"></script>

<script type="text/javascript" src="./vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="./vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="./vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="./vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>


<script type="text/javascript" src="./vendor/waves/waves.min.js"></script>
<script type="text/javascript" src="./vendor/switchery/dist/switchery.min.js"></script>
<script src="./vendor/bootstrap4/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="./vendor/js/app.js"></script>
</body>
</html>

<script type="text/javascript">

    $(document).on('click', '.panel-heading span.icon_minim', function (e) {

       var $this = $(this);

        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.removeClass('fa fa-minus').addClass('fa fa-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('fa fa-plus').addClass('fa fa-minus');
        }

    });

    $(document).on('focus', '.panel-footer input.chat_input', function (e) {

        var $this = $(this);
        if ($('#minim_chat_window').hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideDown();
            $('#minim_chat_window').removeClass('panel-collapsed');
            $('#minim_chat_window').removeClass('fa fa-plus').addClass('fa fa-minus');
        }

    });

    $(document).on('click', '#new_chat', function (e) {

        var size = $( ".chat-window:last-child" ).css("margin-left");
        size_total = parseInt(size) + 400;
        alert(size_total);
        var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
        clone.css("margin-left", size_total);

    });

    $(document).on('click', '.icon_close', function (e) {
        //$(this).parent().parent().parent().parent().remove();
        $( "#chatbox" ).hide();
    });


   /* $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="tooltip"]').on('shown.bs.tooltip', function () {
            id = $(this).attr('aria-describedby')
            color = $(this).attr('data-color');
            $('.tooltip#' + id).addClass(color);
        })

    });*/

</script>


