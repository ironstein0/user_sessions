<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<h2><?php echo $user['name'] ?></h2>
<h3>Session ID: <?php echo session_id() ?></h3>
<h3>ID: <?php echo $user['id'] ?></h3>
<script>
	var connection = new WebSocket('ws://127.0.0.1:8080', ['soap', 'xmpp']);

connection.onmessage = function (e) {
	if (e.data === 'reload') {
		location.reload();
	}
};
</script>