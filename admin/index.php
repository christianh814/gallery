<?php include("includes/header.php"); ?>
<?php if(!$session->isSignedIn()) { redirectTo("login.php"); } ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Topbar Menu Items -->
		<?php include("includes/top_nav.php"); ?>

            <!-- Sidebar Menu Items -->
		<?php include("includes/side_nav.php"); ?>

        </nav>
        <!-- /Navigation -->

        <!-- /#page-wrapper -->
        <div id="page-wrapper">
		<?php include("includes/admin_content.php"); ?>
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
