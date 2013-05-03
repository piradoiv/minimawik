<?php

class Page_model extends DataMapper {

    var $table = 'pages';
    var $has_one = array();
    var $has_many = array();

    var $validation = array(
        'slug' => array(
            'rules' => array('required', 'max_length' => 255),
            'label' => 'Slug'
        )
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

}

/* End of file page.php */
/* Location: ./application/models/page.php */
