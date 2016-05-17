<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BalancosController extends AppController {
    public $uses = array('Balanco', 'Produto');
    public $helpers = array('Html', 'Form', 'Paginator', 'Time');
    public $paginate = array(
        'limit' => 12
    );
    public $components = array(
        'Search.Prg',
        'Paginator'
    );
    public $presetVars = array(
        'produto_name_search' => array('type' => 'value'), 
        'data_search' => array('type' => 'value')
        );

    public function find() {         
        $this->Paginator->settings = $this->paginate;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Balanco->parseCriteria($this->Prg->parsedParams());
        $this->set('balancos', $this->paginate());
    }

    public function index() {
        $this->Paginator->settings = $this->paginate;
        $this->set('balancos', $this->paginate());
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }
        $this->Balanco->recursive = 0;
        $balanco = $this->Balanco->findById($id);
        if (!$balanco) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('balanco', $balanco);
    }

    public function add() {
        $this->Produto->recursive = -1;
        $this->set('produtos', $this->Produto->find('list'));
        if ($this->request->is('post')) {
            $this->Balanco->create();
            if ($this->Balanco->save($this->request->data)) {
                $this->Flash->set(__('Balanco cadastrado'));                      
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('Nao foi possivel cadastrar balanco'));
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
        $this->Produto->recursive = -1;
        $this->set('produtos', $this->Produto->find('list'));

        if ($this->request->is(array('post', 'put'))) {
            $this->Balanco->id = $id;
            if ($this->Balanco->save($this->request->data)) {
                $this->Flash->set('Registro alterado');
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
            $this->Flash->set('Balanco removido');
        } else {
            $this->Flash->set('Não foi possivel remover balanco');
        }
        return $this->redirect(array('action' => 'index'));
    }
    
}
