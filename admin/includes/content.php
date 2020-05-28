<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <h3>Alle users </h3>
            <?php
            $users = User::find_all();
            foreach ($users as $user) {
                echo $user->username . "<br>";
            }
            ?>
            <h3>Zoek user met id </h3>
            <?php
            /*$result = User::find_user_by_id(1);
            echo $result['username'] . "<br>";*/

            $user = User::find_by_id(1);


            echo $user->username . ' - ' . $user->id . ' - ' . $user->first_name;
            ?>

            <?php
            // create user
/*           $user = new User();
            $user->username = "Sophia";

            $user->save();*/
            ?>

            <?php
            // update user
            /*   $user = User::find_by_id(2);
               $user->last_name = "Berbic";

               $user->save();*/

            ?>

            <?php
            // delete user
            /*      $user = User::find_by_id(4);
                  $user->delete();*/

            ?>

            <h3>Alle foto's</h3>
            <?php
            $photos = Photo::find_all();
            foreach ($photos as $photo){
                echo $photo->title . "<br>";
            }

            ?>

            <h3>Includes path?</h3>
            <?php
          /*  $photo = new Photo();
            $photo->title = "SAM";
            $photo->description = "Lorem ipsum";
            $photo->size = 15;

            $photo->save();*/

            echo  INCLUDES_PATH

            ?>

        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($aantalUsers); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aantal foto's
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($aantalPhotos); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($aantalComments); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->