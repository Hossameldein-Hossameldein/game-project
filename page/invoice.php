<?php if(isset($_SESSION['acc'])): ?>
    <div class="invoice container">
            <div class="card mt-5 p-2 bg-transparent">
                <h3 class="card-title p-4 m-0 text-white">Invoices</h3>
                <div class="card-body p-4 m-0 text-white">
                    <table class="table text-white w-100">
                        <thead>
                            <tr>
                                <th scope="col">Payment Gross</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($getrows > 0):
                        foreach($getinvoice as $value):      
                            ?>

                            <tr>
                                <td><?php echo $value['payment_gross']?>$</td>
                                <td class="text-success"><?php echo $value['payment_status']?></td>
                                <td><?php echo $value['created']?></td>
                            </tr>
                            <?php
                         endforeach;
                        endif;
                         ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
else:
    echo "<script>document.location.href = 'login';</script>";
endif;?>
