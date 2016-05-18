<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProdutosController extends AppController {

    public $helpers = array('Html', 'Form', 'Paginator');
    public $paginate = array(
        'limit' => 12
    );
    public $components = array(
        'Search.Prg',
        'Paginator'
    );
    
    public $presetVars = array('name_search' => array('type' => 'value'));
    
    public function find() {         
        $this->Paginator->settings = $this->paginate;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Produto->parseCriteria($this->Prg->parsedParams());
        $this->Produto->recursive = -1;
        $this->set('produtos', $this->paginate());
    }

    public function index() {         
        $this->Paginator->settings = $this->paginate;
        $this->Produto->recursive = -1;
        $this->set('produtos', $this->paginate());
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->Produto->recursive = -1;
        $produto = $this->Produto->findById($id);
        if (!$produto) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->set('produto', $produto);
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Produto->create();
            if ($this->Produto->save($this->request->data)) {
                $this->Flash->set(__('Produto cadastrado'));                      
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('Nao foi possivel cadastrar produto'));
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid'));
        }

        $this->Produto->recursive = -1;
        $produto = $this->Produto->findById($id);
        if (!$produto) {
            throw new NotFoundException(__('Invalid'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Produto->id = $id;
            if ($this->Produto->save($this->request->data)) {
                $this->Flash->set('Registro alterado');
                return $this->redirect(array('action' => 'index'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $produto;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new UnauthorizedException(__('Not allowed'));
        }

        if (!$id) {
            throw new NotFoundException(__('Invalid id'));
        }

        $this->Produto->recursive = -1;
        $produto = $this->Produto->findById($id);
        if (!$produto) {
            throw new NotFoundException(__('Invalid id'));
        }

        if ($this->Produto->delete($id)) {
            $this->Flash->set('Produto removido');
        } else {
            $this->Flash->set('Não foi possivel remover produto');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
