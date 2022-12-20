<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Client</title>
	<script src="jquery-3.6.2.js"></script>
</head>
<body>

	<form id="loginForm">
	    <label for="username">Name</label>
	    <input id="username" name="username" type="text" value="admin" />

	    <label for="password">Name</label>
	    <input id="password" name="password" type="text" value="password" />

	    <input type="submit" value="Send" />
	</form>

	<br><br>
	<button id="btnCheckSession">btnCheckSession</button>

	<br><br>
	<button id="btnUserProfile">btnUserProfile</button>

	<br><br>
	<button id="btnLogout">btnLogout</button>


	<br><br><hr>

	<pre id="preLog"></pre>


	<script type="text/javascript">

		var base_api = "";

		// Variable to hold request
		var request;

		// A $( document ).ready() block.
		$( document ).ready(function() {
		    console.log( "ready!" );

		// Bind to the submit event of our form
		$("#loginForm").submit(function(event){

		    // Prevent default posting of form - put here to work in case of errors
		    event.preventDefault();

		    // Abort any pending request
		    if (request) {
		        request.abort();
		    }
		    // setup some local variables
		    var $form = $(this);

		    // Let's select and cache all the fields
		    var $inputs = $form.find("input, select, button, textarea");

		    // Serialize the data in the form
		    var serializedData = $form.serialize();

		    // Let's disable the inputs for the duration of the Ajax request.
		    // Note: we disable elements AFTER the form data has been serialized.
		    // Disabled form elements will not be serialized.
		    $inputs.prop("disabled", true);

		    // Fire off the request
		    request = $.ajax({
		        url: base_api + "api.php?action=user:auth",
		        type: "post",
		        data: serializedData
		    });

		    // Callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		        // Log a message to the console
		        console.log("Hooray, it worked!");
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

		    // Callback handler that will be called regardless
		    // if the request failed or succeeded
		    request.always(function () {
		        // Reenable the inputs
		        $inputs.prop("disabled", false);
		    });

		});

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

	</script>

</body>
</html>


