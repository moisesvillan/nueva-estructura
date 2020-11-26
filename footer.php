    <?php if(isset($_SESSION['autch'])): connect_mysqli();?>  
            <footer class="footer"> © <?php echo date('Y') ?> IUTOMS </footer>
        </div>
	</div>
    <?php endif; ?>
    <script src="<?php echo _BASE_URL_?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/waves.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/sidebarmenu.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/js/custom.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <?php if(isset($_SESSION['autch'])): ?>
        <script src="<?php echo _BASE_URL_?>assets/plugins/calendar/jquery-ui.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/moment/min/moment.min.js"></script>
        <script src='<?php echo _BASE_URL_?>assets/plugins/calendar/dist/fullcalendar.min.js'></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/calendar/dist/cal-init.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/js/dashboard3.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
        
        <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/datatables/vfs_fonts.js"></script>
    <?php endif; ?>
</body>

</html>