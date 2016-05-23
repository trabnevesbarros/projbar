<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Balanco extends AppModel {

    public $validate = array(
        'valor' => array(
            array('rule' => 'notBlank'),
            array('rule' => 'money')
        ),
        'quantidade' => array(
            array('rule' => 'notBlank'), 
            array('rule' => 'numeric')
        ),
        'produto_id' => array(
            array('rule' => 'notBlank'), 
            array('rule' => 'numeric')
        )
        
    );
    public $actsAs = array('Search.Searchable');
    public $virtualFields = array(
        'total' => '"Balanco"."valor" * "Balanco"."quantidade"'
    );
    public $filterArgs = array(
        'produto_name_search' => array(
            'type' => 'ilike',
            'field' => 'Produto.name',
            'required' => false
        ),
        'data_search' => array(
            'type' => 'query',
            'method' => 'findTimestamp'
        ),
        'data_s_search' => array(
            'type' => 'query',
            'method' => 'findBetweenTimestamps'
        )
    );
    
    public $belongsTo = array('Produto' => array('dependent' => true));

    public function findTimestamp($data = array()) {
        $datestr = $data['data_search']['year'] . '-' . $data['data_search']['month'] . '-' . $data['data_search']['day'];
        return array('DATE("Balanco.data")' => $datestr);
    }
    
    public function findBetweenTimestamps($data = array()) {
        $datestrs = $data['data_s_search']['year'] . '-' . $data['data_s_search']['month'] . '-' . $data['data_s_search']['day'] . ' ' . $data['data_s_search']['hour'] . ':' . $data['data_s_search']['min'] . ' ' . $data['data_s_search']['meridian'];
        $datestrf = $data['data_f_search']['year'] . '-' . $data['data_f_search']['month'] . '-' . $data['data_f_search']['day'] . ' ' . $data['data_f_search']['hour'] . ':' . $data['data_f_search']['min'] . ' ' . $data['data_f_search']['meridian'];
        return array('("Balanco.data") BETWEEN ? AND ?' => array(date('Y-m-d H:i:s', strtotime($datestrs)), date('Y-m-d H:i:s', strtotime($datestrf))));
    }

}
