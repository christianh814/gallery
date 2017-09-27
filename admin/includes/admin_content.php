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
				$user = User::findUserById(3);
				$user->delete();
				*/

				/*
				$user = User::findUserById(4);
				$user->username = "cucumberexpress";
				$user->save();
				*/

				$user = new User();
				$user->username = "donnyj";
				$user->password = "123";
				$user->first_name = "Donald";
				$user->last_name = "Joseph";
				$user->save();

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
