<?php
// $Header: /cvsroot/html2ps/css.border.bottom.style.inc.php,v 1.1 2006/09/07 18:38:13 Konstantin Exp $

class CSSBorderBottomStyle extends CSSSubProperty
{
    public function __construct(&$owner)
    {
        parent::__construct($owner);
    }

    public function setValue(&$owner_value, &$value)
    {
        $owner_value->bottom->style = $value;
    }

    public function &getValue(&$owner_value)
    {
        return $owner_value->bottom->style;
    }

    public static function getPropertyCode()
    {
        return CSS_BORDER_BOTTOM_STYLE;
    }

    public static function getPropertyName()
    {
        return 'border-bottom-style';
    }

    public static function parse($value)
    {
        if ($value == 'inherit') {
            return CSS_PROPERTY_INHERIT;
        }

        return CSSBorderStyle::parse_style($value);
    }

    public static function default_value()
    {
    }

}
