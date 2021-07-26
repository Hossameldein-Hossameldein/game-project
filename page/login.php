<?php
if (isset($_SESSION['acc'])) :
  header("location:index");
else :
?>
  <div class="login container">
    <div class="card mt-5 p-2 bg-transparent">
      <h3 class="card-title p-4 m-0 text-white">Login Now!</h3>
      <div class="card-body p-4 m-0 text-white">
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input id="username" name="username" type="text" class="text-white form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input id="password" name="password" type="password" class="text-white form-control" id="exampleInputPassword1">
          </div>
          <input id="login" type="button" class="d-block" value="submit"></input>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>