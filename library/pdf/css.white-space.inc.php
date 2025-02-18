<?php
// $Header: /cvsroot/html2ps/css.white-space.inc.php,v 1.9 2007/01/24 18:55:52 Konstantin Exp $

define('WHITESPACE_NORMAL',   0);
define('WHITESPACE_PRE',      1);
define('WHITESPACE_NOWRAP',   2);
define('WHITESPACE_PRE_WRAP', 3);
define('WHITESPACE_PRE_LINE', 4);

class CSSWhiteSpace extends CSSPropertyStringSet {
  function __construct() {
      parent::__construct(true,
                          true,
                          array('normal'   => WHITESPACE_NORMAL,
                                'pre'      => WHITESPACE_PRE,
                                'pre-wrap' => WHITESPACE_PRE_WRAP,
                                'nowrap'   => WHITESPACE_NOWRAP,
                                'pre-line' => WHITESPACE_PRE_LINE));
  }

  function default_value() { 
    return WHITESPACE_NORMAL; 
  }

  function getPropertyCode() {
    return CSS_WHITE_SPACE;
  }

  function getPropertyName() {
    return 'white-space';
  }
}

$css_white_space_inc_reg1 = new CSSWhiteSpace();
CSS::register_css_property($css_white_space_inc_reg1);
