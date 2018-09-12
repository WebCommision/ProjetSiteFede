
<script type='text/javascript'>

	window.onload = function(){

	  	var popup2 = document.getElementById('popup2');
	    var overlay2 = document.getElementById('backgroundOverlay2');
	    var openButton2 = document.getElementById('openOverlay2');
	    document.onclick = function(e){
	        if(e.target.id == 'backgroundOverlay2'){
	            popup2.style.display = 'none';
	            overlay2.style.display = 'none';
	        }
	    };
	};


    function showWarning(backgroundOverlay2,popup2) {

            var pop2 = document.getElementById('popup2');
            var overlay2 = document.getElementById('backgroundOverlay2');

           
                pop2.style.display = 'block';
                overlay2.style.display = 'block';
            
    }

</script>