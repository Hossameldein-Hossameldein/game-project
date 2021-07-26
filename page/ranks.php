 <!-- Ranks -->
 <div class="ranks container">
            <div class="card mt-5 p-2 bg-transparent">
                <h3 class="card-title p-4 m-0 text-white">Donation</h3>
                <div class="card-body p-4 m-0 text-white">
                    <table class="table text-white w-100">
                        <thead>
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Name</th>
                                <th scope="col">Donation</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($donation_rank as $key => $value):
                            if($key < 4):
                            ?>

                            <tr>
                                <td><img src="assets/images/king.png" alt=""></td>
                                <td><?php echo $value[1]?></td>
                                <td><?php echo $value[0]?></td>
                            </tr>
                            <?php endif;?>
                            <?php if($key >3 && $key < 19):
                            ?>

                            <tr>
                                <td><img src="assets/images/prince.png" alt=""></td>
                                <td><?php echo $value[1]?></td>
                                <td><?php echo $value[0]?></td>
                            </tr>
                            <?php endif;?>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>