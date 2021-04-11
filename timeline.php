<?php
    session_start();
    if (!isset($_SESSION['fullName'])){
        header("Location: index.html");
    }
    // $counter = 1;
    // $sql = mysqli_query($connect, "SELECT * FROM post WHERE fullName = '$_SESSION'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/timeline.css">
</head>
<body>
  <nav class="navbar navbar-light bg-white">
    <a href="#" class="navbar-brand">InstaApp</a>
    <form class="form-inline">
      <div class="input-group">
        <div class="input-group-append">
          <a href="logout.php" class="navbar-brand">Logout</a>
        </div>
      </div>
    </form>
  </nav>
  <div class="container-fluid gedf-wrapper">
    <div class="row">
      <div class="col-md-3">
        <!-- Kiri -->
      </div>
      <div class="col-md-6 gedf-main">
        <!--  -->
        <div class="card gedf-card">
          <form method="POST" id="post-form" action="post.php" enctype="multipart/form-data">
            <div class="card-body">
              <div class="tab-content" id="myTabContent">
                  <div class="form-group">
                    <div class="custom-file">
                      <label class="custom-file-label" for="customFile">Upload image</label>
                      <input class="custom-file-input" type="file" name="customFile" id="customFile">
                    </div>
                  </div>
                  <div class="form-group">
                      <input class="form-control" type="text" name="caption" id="caption" placeholder="Caption"/>
                  </div>
                  <div class="btn-toolbar justify-content-between">
                    <div class="btn-group">
                      <input type="submit" class="btn btn-primary" value="share">
                    </div>
                  </div>
              </div>
            </div>
          </form>
        </div>
        <!--  -->
        <?php
          include 'connect.php';
          $sql = mysqli_query($connect, "SELECT * FROM post WHERE fullName = '$_SESSION[fullName]'");
          while($row = $sql -> fetch_assoc()) {
            $_DATA['caption'] = $row['caption'];
            $_DATA['times'] = $row['times'];
            $_IMG = base64_encode($row['post_image']);

            echo
            '<div class="card gedf-card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-2">
                      <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                    </div>
                    <div class="ml-2">
                      <div class="h5 m-0">'. $_SESSION['fullName'] .'</div>
                    </div>
                  </div>
                  <div>
                    <div class="dropdown">
                      <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                        <div class="h6 dropdown-header">Configuration</div>
                        <a class="dropdown-item" href="#">Save</a>
                        <a class="dropdown-item" href="#">Hide</a>
                        <a class="dropdown-item" href="#">Report</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>'.$_DATA['times'].'</div>
                <a class="card-link">
                  <img src="'.$_IMG.'" width="100" height="100" alt="">
                  <h5 class="card-title">'.$_DATA['caption'].'</h5>
                </a>
              </div>
              <div class="card-footer">
                <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                <form method="POST" id="comment-form" action="comment.php">
                  <div class="form-group">
                    <p></p>
                    <input class="form-control" type="text" name="caption" id="caption" placeholder="Caption"/>
                    <a href="#" class="card-link">
                      <input type="submit" class="btn btn-primary" value="comment">
                    </a>
                  </div>
                </form>
              </div>
            </div>';
          };
        ?>
        <!--  -->
      </div>
      <div class="col-md-3">
        <!-- KANAN -->
      </div>
    </div>
  </div>
  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
