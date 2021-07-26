<?php if(isset($_SESSION['acc'])): ?>
<div class="container store">
    <p class="text-white text-center">
    طريقة الدفع فى السيرفر ، يتم تداول النقط بأسم نقاط لعنة ثم يتم صرف هذه النقط عن طريق ان بى سي باسم نقاط لعنة و قيمة النقطه الواحده تساوى 1 دولار
    </p>
    <p class="text-white text-center">احداثيات : (409,347)</p>
    <p class="text-white text-center">The method of payment in the server is by purchasing curse points, then these points are exchanged through NPC in the name of Curse points, and the value of one point is equal to 1 dollar
</p>
<p class="text-white text-center">Teleport : (409,347)</p>
<div class="text-center d-flex mt-5 justify-content-center">
    <a id="button" href="checkout">Charge Now!</a>
</div>
<div class="mt-4">
    <img src="assets/images/npc.jpg" alt="" srcset="" width="100%">
</div>


</div>
<?php
 else: 
echo "<script>document.location.href = 'login';</script>";
endif;
?>