<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Client</title>
	<script src="jquery-3.6.2.js"></script>
</head>
<body>

	<br><br>
	<button id="btnCheckSession">btnCheckSession</button>

	<br><br>
	<button id="btnUserProfile">btnUserProfile</button>

	<br><br>
	<button id="btnLogout">btnLogout</button>


	<br><br><hr>

	<pre id="preLog"></pre>


	<script type="text/javascript">

		var base_api = "http://sandbox.test/session/";

		// Variable to hold request
		var request;

		// A $( document ).ready() block.
		$( document ).ready(function() {
		    console.log( "ready!" );

		    autoDetect();

		    // same code as autoDetect (actually)
		    $("#btnCheckSession").click(function(event){
				// Fire off the request
				request = $.ajax({
			        url: base_api + "api.php?action=debug:session",
			        type: "get"
			    });

			    // Callback handler that will be called on success
			    request.done(function (response, textStatus, jqXHR){
			        // Log a message to the console
			        console.log(response);
			        $('#preLog').append("\r\n DEBUG   : " + JSON.stringify(response));
			    });

			    // Callback handler that will be called on failure
			    request.fail(function (jqXHR, textStatus, errorThrown){
			        // Log the error to the console
			        console.error(
			            "The following error occurred: "+
			            textStatus, errorThrown
			        );
			        $('#preLog').append("\r\n FAILLED : " + errorThrown);
			    });
			});


			$("#btnUserProfile").click(function(event){
				// Fire off the request
				request = $.ajax({
			        url: base_api + "api.php?action=user:profile",
			        type: "get"
			    });

			    // Callback handler that will be called on success
			    request.done(function (response, textStatus, jqXHR){
			        // Log a message to the console
			        console.log(response);
			        $('#preLog').append("\r\n SUCCESS : " + JSON.stringify(response));
			    });

			    // Callback handler that will be called on failure
			    request.fail(function (jqXHR, textStatus, errorThrown){
			        // Log the error to the console
			        console.error(
			            "The following error occurred: "+
			            textStatus, errorThrown
			        );
			        $('#preLog').append("\r\n FAILLED : " + errorThrown);
			    });
			});


			$("#btnLogout").click(function(event){
				// Fire off the request
				request = $.ajax({
			        url: base_api + "api.php?action=user:logout",
			        type: "get"
			    });

			    // Callback handler that will be called on success
			    request.done(function (response, textStatus, jqXHR){
			        // Log a message to the console
			        console.log(response);
			        $('#preLog').append("\r\n SUCCESS : " + JSON.stringify(response));
			    });

			    // Callback handler that will be called on failure
			    request.fail(function (jqXHR, textStatus, errorThrown){
			        // Log the error to the console
			        console.error(
			            "The following error occurred: "+
			            textStatus, errorThrown
			        );
			        $('#preLog').append("\r\n FAILLED : " + errorThrown);
			    });
			});

		});	


		function autoDetect() {
			// Fire off the request
			request = $.ajax({
		        url: base_api + "api.php?action=debug:session",
		        type: "get"
		    });

		    // Callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		        // Log a message to the console
		        console.log(response);
		        $('#preLog').append("\r\n DEBUG   : " + JSON.stringify(response));
		    });

		    // Callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		        // Log the error to the console
		        console.error(
		            "The following error occurred: "+
		            textStatus, errorThrown
		        );
		        $('#preLog').append("\r\n FAILLED : " + errorThrown);
		    });

		    request.always(function () {
		        $('#preLog').append("\r\n \r\n ------- : ------- \r\n ");
		    });
		}

	</script>

</body>
</html>


