<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produto extends AppModel {
    
    public $validate = array(
        'name' => array(
            array('rule' => 'notEmpty'),
            array('rule' => 'isUnique')
        ),
        'quantidade' => array(
            array('rule' => 'notEmpty')
        ),
        'preco' => array(
            array('rule' => 'notEmpty')
        )
    );
    
    public $actsAs = array('Search.Searchable');
    
    public $filterArgs = array(
        'name_search' => array(
            'type' => 'ilike',
            'field' => 'name',
            'required' => false
        )
    );
    
    public $hasMany = array('Balanco' => array('dependent' => true));
}
