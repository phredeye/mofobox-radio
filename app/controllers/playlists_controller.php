<?php
class PlaylistsController extends AppController {

	var $name = 'Playlists';


	function stream() {
		$this->layout = false;
		header("Content-type: audio/x-scpls");
		
	}

	function index() {
		$this->Playlist->recursive = 0;
		$this->set('playlists', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid playlist', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('playlist', $this->Playlist->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Playlist->create();
			if ($this->Playlist->save($this->data)) {
				$this->Session->setFlash(__('The playlist has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playlist could not be saved. Please, try again.', true));
			}
		}
		$tracks = $this->Playlist->Track->find('list');
		$users = $this->Playlist->User->find('list');
		$this->set(compact('tracks', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid playlist', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Playlist->save($this->data)) {
				$this->Session->setFlash(__('The playlist has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playlist could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Playlist->read(null, $id);
		}
		$tracks = $this->Playlist->Track->find('list');
		$users = $this->Playlist->User->find('list');
		$this->set(compact('tracks', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for playlist', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Playlist->delete($id)) {
			$this->Session->setFlash(__('Playlist deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Playlist was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>