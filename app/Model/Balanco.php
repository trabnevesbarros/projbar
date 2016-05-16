<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Balanco extends AppModel {

    public $validate = array();
    
    public $actsAs = array('Search.Searchable');
    
    public $virtualFields = array(
        'total' => '"Balanco"."valor" * "Balanco"."quantidade"'
    );
    
    public $filterArgs = array(
        'produto_search' => array(
            'type' => 'ilike',
            'field' => 'produto_id',
            'required' => false
        ),
        'timestamp_search' => array(
            'type' => 'query',
            'method' => 'findTimestamp',
            'required' => false
        )
    );

    public $belongsTo = array('Produto' => array('dependent' => true));
    
    public function findTimestamp($data = array()) {
        $this->Formacao->Behaviors->attach('Containable', array(
                'autoFields' => false
            )
        );
        $this->Formacao->DocentesFormacao->Behaviors->attach('Search.Searchable');
        $query = $this->Formacao->DocentesFormacao->getQuery('all', array(
            'conditions' => array(
                array('DocentesFormacao.formacao_id' => $data['formacoes'])
            ),
            'fields' => array(
                'docente_id'
            ),
            'contain' => array(
                'Docente'
            )
        ));
        return $query;
    }
}

