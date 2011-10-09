<?php

class ArtistsController extends AppController
{

    public $name = 'Artists';
    public $helpers = array( "AlphaPager" );

    public function index()
    {
        if($this->isJson())
        {
            $this->paginate[ "Artist" ] = array(
                "contain" => array( ),
                "order" => "Artist.name"
            );
            $this->set("data", $this->paginate());
        }
        else
        {
            $this->redirect(array( "action" => "alpha" ));
            exit();
        }
    }

    function alpha($alpha = "a")
    {
        $this->paginate = array(
            'conditions' => array( 'Artist.name LIKE' => sprintf('%s%%', $alpha) ),
            'limit' => 10
        );

        $artists = $this->paginate("Artist");
        foreach($artists as $idx => $artist)
        {
            $albumArt = $this->Artist->getAlbumArt($artist[ "Artist" ][ "id" ]);
            $artists[ $idx ][ "Artist" ][ "AlbumArt" ] = $albumArt;
        }
        $this->set('artists', $artists);
        $this->set("alpha", $alpha);
    }

    function view($id = null)
    {
        if(!$id)
        {
            $this->Session->setFlash(__('Invalid artist', true));
            $this->redirect(array( 'action' => 'index' ));
        }

        $this->Artist->contain();
        $artist = $this->Artist->read(null, $id);
        $albums = $this->Artist->getAlbums($id);

        $this->set('artist', $artist);
        $this->set("albums", $albums);
    }

    function add()
    {
        if(!empty($this->data))
        {
            $this->Artist->create();
            if($this->Artist->save($this->data))
            {
                $this->Session->setFlash(__('The artist has been saved', true));
                $this->redirect(array( 'action' => 'index' ));
            }
            else
            {
                $this->Session->setFlash(__('The artist could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null)
    {
        if(!$id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid artist', true));
            $this->redirect(array( 'action' => 'index' ));
        }
        if(!empty($this->data))
        {
            if($this->Artist->save($this->data))
            {
                $this->Session->setFlash(__('The artist has been saved', true));
                $this->redirect(array( 'action' => 'index' ));
            }
            else
            {
                $this->Session->setFlash(__('The artist could not be saved. Please, try again.', true));
            }
        }
        if(empty($this->data))
        {
            $this->data = $this->Artist->read(null, $id);
        }
    }

    function delete($id = null)
    {
        if(!$id)
        {
            $this->Session->setFlash(__('Invalid id for artist', true));
            $this->redirect(array( 'action' => 'index' ));
        }
        if($this->Artist->delete($id))
        {
            $this->Session->setFlash(__('Artist deleted', true));
            $this->redirect(array( 'action' => 'index' ));
        }
        $this->Session->setFlash(__('Artist was not deleted', true));
        $this->redirect(array( 'action' => 'index' ));
    }

}

