<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".datepicker").datepicker();
});  
function setGlobal(value){
	var queryString = "id="+value;
	$.ajax({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		url:"society/set-global-session", type: "post", data: queryString, cache: false,
            error: function()
			{
              alert("something wrong!!");
			},
            success: function (response)
            {  
				console.log(response);
				location.reload();		
            }
	});
}
</script>
</body>
</html>
