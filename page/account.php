<?php if(isset($_SESSION['acc'])): ?>
<div class="account container">
    <div class="card mt-5 p-2 bg-transparent">
        <h3 class="card-title p-4 m-0 text-white">HI <?php echo $namePlayer; ?> !</h3>
        <div class="card-body p-4 m-0 text-white">
            <div class="row">
                <div class="col-lg-4 col-12 p-3 text-center">
                    <button id="showforget" class="btn w-100">Forget Passowrd</button>
                </div>
                <div class="col-lg-4 col-12 p-3 text-center">
                    <button id="showforget" class="btn w-100">Change Email</button>
                </div>
                <div class="col-lg-4 col-12 p-3 text-center">
                    <a href="invoice" class="btn w-100">Your Invoices</a>
                </div>
            </div>
            <!-- Form forget password -->
            <div class="forget-form card mt-5 p-2 bg-transparent">
                <h3 class="card-title p-4 m-0 text-white">Change Your Password!</h3>
                <div class="card-body p-4 m-0 text-white">
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            <input id="oldpass" name="username" type="text" class="text-white form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input id="newpass" name="password" type="password" class="text-white form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input id="confirmpass" name="password" type="password" class="text-white form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="form-group"></div>
                        <input id="forget" type="button" class="d-block" value="submit"></input>
                    </form>
                </div>
            </div>
            <!-- end form forget password -->
        </div>
    </div>
</div>
<?php
 else: 
echo "<script>document.location.href = 'login';</script>";
endif;
?>