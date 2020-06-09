<?php


class PostShell extends AppShell
{
	public $uses = array('Post');

	public function main() {
		$post = $this->Post->find('first', array('conditions' => array('Post.title LIKE' => '%' . $this->args[0] . '%')));
		$this->out(print_r($post, true));
	}
}
