<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BalancosController extends AppController {

    public $helpers = array('Html', 'Form', 'Paginator', 'Time');
    public $paginate = array(
        'limit' => 12
    );
    public $components = array(
        'Search.Prg',
        'Paginator'
    );
    public $presetVars = array(
        'produto_search' => array('type' => 'value'), 
        'timestamp_search' => array('type' => 'time')
        );

    public function find() {         
        $this->Paginator->settings = $this->paginate;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Balanco->parseCriteria($this->Prg->parsedParams());
        $this->Balanco->recursive = -1;
        $this->set('balancos', $this->paginate());
    }

    public function index() {         
        $this->Paginator->settings = $this->paginate;
        $this->Balanco->recursive = -1;
        $this->set('balancos', $this->paginate());
        $balancos = $this->Balanco->find('all');   
        debug($balancos);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->Balanco->recursive = -1;
        $balanco = $this->Balanco->findById($id);
        if (!$balanco) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('balanco', $balanco);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Balanco->create();
            if ($this->Balanco->save($this->request->data)) {
                $this->Session->setFlash(__('Balanco cadastrado'));                      
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Nao foi possivel cadastrar balanco'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->Balanco->recursive = -1;
        $balanco = $this->Balanco->findById($id);
        if (!$balanco) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Balanco->id = $id;
            if ($this->Balanco->save($this->request->data)) {
                $this->Session->setFlash('Registro alterado');
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $balanco;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new UnauthorizedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid id'));
        }

        $this->Balanco->recursive = -1;
        $balanco = $this->Balanco->findById($id);
        if (!$balanco) {
            throw new NotFoundException(__('Invalid id'));
        }

        if ($this->Balanco->delete($id)) {
            $this->Session->setFlash('Balanco removido');
        } else {
            $this->Session->setFlash('Não foi possivel remover balanco');
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    

}
