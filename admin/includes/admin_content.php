<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php
                // $userSet = User::getAllUsers();

                // while ($row = mysqli_fetch_array($userSet)) {
                //     echo $row['username']." ".$row['last_name']."<br>";
                // }

                // $userById = User::getUserById(1);
                // $user = User::instantiation($userById);


                // echo $user->id." ".$user->username." ".$user->password;
                
                $users = User::getAllUsers();

                foreach ($users as $user) {
                    echo $user->username."<br>";
                }
                
                $userById = User::getUserById(1);
                echo $userById->id." ".$userById->username." ".$userById->password;
            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
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
