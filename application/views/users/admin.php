<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<h2><?php echo $user['name'] ?> (ADMIN)</h2>
<h3>Session ID: <?php echo session_id() ?></h3>
<h3>ID: <?php echo $user['id'] ?></h3>
<button id="submit_button" onClick="submit()">Destroy User Sessions</button>
<script>
	var connection = new WebSocket('ws://127.0.0.1:8080', ['soap', 'xmpp']);

	function submit() {
		$.ajax({
        url: "/users/kill_all",
        type: "post",
		});

		// TODO: make sure connection.onOpen before sending
		// the message.
		connection.send('reload');
	}
</script>