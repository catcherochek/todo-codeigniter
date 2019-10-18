


</div>
</div>
<div class="parallax-container">
	<div class="parallax"><img src="<?php echo base_url(); ?>assets/uploads/parrimg1.png"></div>
</div>

<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize/js/materialize.min.js"></script>
<script>

	M.AutoInit();

    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, options);
        });
		var elems = document.querySelectorAll('.datepicker');
		elems[0].addEventListener("change", function() {
			if (moment().diff(elems[0].value,'years',true)<18){
				alert('sorry you have to be  older than 18');
				elems[0].value = '';
			}else{

			}


		});
		var instances = M.Datepicker.init(elems, {format:"yyyy-mm-dd"});
    });

    // Or with jQuery



</script>



</body>
</html>
