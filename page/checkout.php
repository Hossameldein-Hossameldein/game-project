<?php if(isset($_SESSION['acc'])): ?>
<div class="container chechkout mb-5">
    <div class="card mt-5 p-2 bg-transparent">
      <h3 class="card-title p-4 m-0 text-white">Buy Now!</h3>
      <div class="card-body p-4 m-0 text-white">
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputPassword1">1 Curse Point = 1 $ please Enter the number of points you want to buy</label>
            <input id="points" name="points" type="number" class="text-white form-control" id="exampleInputPassword1">
			</div>
             <input id="buy" type="button" class="d-block" value="Buy Now"></input>
        </form>
      </div>
    </div>
  </div>
<?php
 else: 
echo "<script>document.location.href = 'login';</script>";
endif;
?>