            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Subheading</small>
                        </h1>
			<?php
				/*
				$user = new User();
				$user->username = "cucumberexpress";
				$user->password = "123";
				$user->first_name = "Dave";
				$user->last_name = "Amaro";
				$user->create();
				*/

				$user = User::findUserById(2);
				$user->delete();

			?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
