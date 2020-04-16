<!DOCTYPE html>
<html>

<head>
  <meta name=”csrf-token” content=”{{ csrf_token() }}” />
  <title>Edit Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="edit.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script>
    $().ready(function() {
      $('.FormEdit').submit(function(e) {
        e.preventDefault();
        $.ajax({
          'type': 'POST',
          'url': 'https://sinerbiminiproject.000webhostapp.com/api/user/edit',
          'data': $(this).serialize(),
          'success': function(html) {
            $('.container').html(html);
          }
        });
      });
    });
  </script>
</head>

<body>
  <!-- Navbar -->
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="edit_profile.html">Profile</a>
      </li>
    </ul>
  </div>
  <!-- End navbar -->
  <div class="container">
    <form class="FormEdit">
      <div class="row justify-content-center">
        <div class="col-12 profile">
          <div class="row edit">
            <div class="col-lg">
              <div class="text-center mb-4">
                <img class="mb-4" src="account.png">
              </div>
              <div class="form-label-group text-center">
                <label>Upload Foto</label><br>
                <input type="file" value="upload gambar">
              </div>
            </div>
            <div class="col-lg">
              <div class="form-label-group">
                <label>ID User</label>
                <input type="text" class="form-control" name="id" value="8fa83c34-e8b0-4483-9c73-f1ac927808d7">
              </div>
              <div class="form-label-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="fullname">
              </div>

              <div class="form-label-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
              </div>

              <div class="form-label-group">
                <label>Birthday Date</label>
                <input type="text" class="form-control" name="birth_date">
              </div>

              <div class="form-label-group">
                <label>Birthday Place</label>
                <input type="text" class="form-control" name="birth_place">
              </div>

              <div class="form-label-group">
                <label>Sex</label>
                <select name="sex" class="form-control">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>

              <div class="form-label-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
              </div>

              <br>
              <input type="submit" class="btn btn-primary btn-sm tombol" value="submit" />
            </div>
          </div>
    </form>
  </div>
</body>

</html>