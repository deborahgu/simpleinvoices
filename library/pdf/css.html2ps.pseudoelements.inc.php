<?php
// $Header: /cvsroot/html2ps/css.html2ps.pseudoelements.inc.php,v 1.1 2006/09/07 18:38:14 Konstantin Exp $

define('CSS_HTML2PS_PSEUDOELEMENTS_NONE'  ,0);
define('CSS_HTML2PS_PSEUDOELEMENTS_BEFORE',1);
define('CSS_HTML2PS_PSEUDOELEMENTS_AFTER' ,2);

class CSSHTML2PSPseudoelements extends CSSPropertyHandler {
  function __construct() {
      parent::__construct(false, false);
  }

  function default_value() { 
    return CSS_HTML2PS_PSEUDOELEMENTS_NONE; 
  }

  function parse($value) {
    return $value;
  }

  function getPropertyCode() {
    return CSS_HTML2PS_PSEUDOELEMENTS;
  }

  function getPropertyName() {
    return '-html2ps-pseudoelements';
  }
}

$css_html2ps_pseudoelements_inc_reg1 = new CSSHTML2PSPseudoelements();
CSS::register_css_property($css_html2ps_pseudoelements_inc_reg1);
