<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog Posts</h1>

<?= $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>

<table>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Action</th>
		<th>Created</th>
	</tr>

<!-- Loop through available posts -->
	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?= $post['Post']['id']; ?></td>
			<td>
				<?= $this->Html->link(
					$post['Post']['title'],
					array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])
				); ?>
			</td>
			<td>
				<?= $this->Html->link(
					'Edit',
					array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])
				); ?>
			</td>
			<td><?= $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>
