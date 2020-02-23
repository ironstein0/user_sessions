<h2>Session Validity</h2>
<table>
	<tr>
		<th>Session ID</th>
		<th>Valid</th>
	</tr>
	<?php foreach ($sessions as $session): ?>
		<tr>
			<td><?php echo $session['session_id'] ?></td>
			<td><?php echo $session['valid'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>
