    <?php if(isset($_SESSION['autch'])): connect_mysqli();?>  
            <footer class="footer"> © <?php echo date('Y') ?> IUTOM </footer>
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
    <script src="<?php echo _BASE_URL_?>assets/js/custom.min.js"></script>
    <script src="<?php echo _BASE_URL_?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <?php if(isset($_SESSION['autch'])): ?>
        <!-- chartist chart -->
        <script src="<?php echo _BASE_URL_?>assets/plugins/chartist-js/dist/chartist.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
        <!-- Vector map JavaScript -->
        <script src="<?php echo _BASE_URL_?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/js/dashboard3.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/moment/min/moment.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/wizard/jquery.steps.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/wizard/jquery.validate.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo _BASE_URL_?>assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="<?php echo _BASE_URL_?>assets/plugins/wizard/steps.js"></script>
    <?php endif; ?>
</body>

</html>