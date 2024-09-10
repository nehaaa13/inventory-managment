<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php include 'header.php' ?>
    <?php include 'sidebar.php'?>
    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div>
          <!-- Your login form or content goes here -->
          <div class="login-div" style="background-color: aliceblue;">
          <h3 class="text-center">Login</h3><hr>
          <form>
            <!-- Login form fields -->
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="login-btn">Login</button>
          </form>
          </div>
        </div>
    </div>
</main>
    <?php include 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>