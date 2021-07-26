<?php if(isset($_SESSION['acc']) && isset($_SESSION['total'])): 
include_once 'page/payment/DB.class.php';
$db = new DB;

// Include and initialize paypal class 
include_once 'page/payment/PaypalExpress.class.php';
$paypal = new PaypalExpress;
?>

<div class="container paynow mb-5">
    <div class="card mt-5 p-2 bg-transparent">
                <h3 class="card-title p-4 m-0 text-white">Check Out Now!</h3>
                <div class="card-body p-4 m-0 text-white">
                    <table class="table text-white w-100">
                        <thead>
                            <tr>
                                <th scope="col">Points</th>
                                <th scope="col">Money</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      

                            <tr>
                                <td><?php echo $_SESSION['total']?></td>
                                <td><?php echo $_SESSION['total']?>$</td>
                                <td><div id="paypal-button"></div></td>
                            </tr>
  
                       
                           
                        </tbody>
                    </table>
                </div>
            </div>
  </div>
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        env: '<?php echo $paypal->paypalEnv; ?>',
        client: {
            sandbox: '<?php echo $paypal->paypalClientID; ?>',
            production: '<?php echo $paypal->paypalClientID; ?>'
        },
        locale: 'en_US',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: <?php echo $_SESSION['total']?>,
                        currency: 'USD'
                    }
                }]
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute()
                .then(function() {
                    window.location = "page/payment/process.php?paymentID=" + data.paymentID + "&token=" + data.paymentToken + "&payerID=" + data.payerID + "&pid=<?php echo $productData['id']; ?>";
                });
        }
    }, '#paypal-button');
</script>
<?php
 else: 
echo "<script>document.location.href = 'login';</script>";
endif;
?>