<?php

class FormBox extends BlockBox
{
    /**
     * @var String form name; it will be used as a prefix for field names when submitting forms
     * @access private
     */
    var $_name;

    public function __construct($name)
    {
        parent::__construct();

        $this->_name = $name;
    }

    public function show(&$driver)
    {
        global $g_config;
        if ($g_config['renderforms']) {
            $driver->new_form($this->_name);
        };
        return parent::show($driver);
    }

    public static function &create(&$root, &$pipeline)
    {
        if ($root->has_attribute('name')) {
            $name = $root->get_attribute('name');
        } elseif ($root->has_attribute('id')) {
            $name = $root->get_attribute('id');
        } else {
            $name = "";
        };

        $box = new FormBox($name);
        $box->readCSS($pipeline->getCurrentCSSState());
        $box->create_content($root, $pipeline);
        return $box;
    }
}
