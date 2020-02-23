<h2>All Users</h2>
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
	</tr>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['id'] ?></td>
			<td><?php echo $user['name'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>
