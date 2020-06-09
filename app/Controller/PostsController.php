<?php


class PostsController extends AppController
{
	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');

	public function index() {
		$this->set('posts', $this->Post->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Post'));
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid Post'));
		}
		$this->set('post', $post);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('Your post was saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Unable to save your post'));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Post not Found'));
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Post not Found'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('Your Post has been updated'));
				return $this->redirect(array('action' => 'view', $post['Post']['id']));
			}
			$this->Flash->error(__('Unable to update your post'));
		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}

	public function delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Post->delete($id)) {
			$this->Flash->success(__('The post with id: %s has been deleted.', h($id)));
		} else {
			$this->Flash->error(__('We could not delete post with id %s', h($id)));
		}

		return $this->redirect(array('action' => 'index'));
	}

}
