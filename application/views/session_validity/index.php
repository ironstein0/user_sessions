<h2>Session Validity</h2>
<table>
	<tr>
		<th>Session ID</th>
		<th>Valid</th>
	</tr>
	<?php foreach ($sessions as $session): ?>
		<tr>
			<td><?php echo $session['session_id'] ?></td>
			<td><?php
				if ($session['valid'] === '0') {
					echo 'FALSE';
				} else {
					echo 'TRUE';
				}
			?></td>
		</tr>
	<?php endforeach; ?>
</table>
