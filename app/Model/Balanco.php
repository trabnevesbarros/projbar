<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Balanco extends AppModel {

    public $validate = array();
    
    public $actsAs = array('Search.Searchable');
    
    public $filterArgs = array(
        'produto_id_search' => array(
            'type' => 'ilike',
            'field' => 'name',
            'required' => false
        )
    );

    public $belongsTo = array('Poduto' => array('dependent' => true));
}
