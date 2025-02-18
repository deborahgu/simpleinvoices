<?php
// $Header: /cvsroot/html2ps/css.pseudo.align.inc.php,v 1.13 2006/09/07 18:38:14 Konstantin Exp $

define('PA_LEFT', 0);
define('PA_CENTER', 1);
define('PA_RIGHT', 2);

// This is a pseudo CSS property for 

class CSSPseudoAlign extends CSSPropertyHandler
{
    public function __construct()
    {
        parent::__construct(true, true);
    }

    public static function default_value()
    {
        return PA_LEFT;
    }

    public function inherit($old_state, &$new_state)
    {
        // This pseudo-property is not inherited by tables
        // As current box display value may not be know at the moment of inheriting,
        // we'll use parent display value, stopping inheritance on the table-row/table-group level

        // Determine parent 'display' value
        $parent_display = $old_state[CSS_DISPLAY];

        $this->replace_array(($parent_display === 'table') ? $this->default_value() : $this->get($old_state),
            $new_state);
    }

    public function parse($value)
    {
        // Convert value to lower case, as html allows values
        // in both cases to be entered
        //
        $value = strtolower($value);

        if ($value === 'left') {
            return PA_LEFT;
        }
        if ($value === 'right') {
            return PA_RIGHT;
        }
        if ($value === 'center') {
            return PA_CENTER;
        }

        // For compatibility with non-valid HTML
        //
        if ($value === 'middle') {
            return PA_CENTER;
        }

        return $this->default_value();
    }

    public static function value2pdf($value)
    {
        switch ($value) {
            case PA_LEFT:
                return "ta_left";
            case PA_RIGHT:
                return "ta_right";
            case PA_CENTER:
                return "ta_center";
            default:
                return "ta_left";
        }
    }

    public static  function getPropertyCode()
    {
        return CSS_HTML2PS_ALIGN;
    }

    public static function getPropertyName()
    {
        return '-html2ps-align';
    }
}

$css_pseudo_align_inc_reg1 = new CSSPseudoAlign();
CSS::register_css_property($css_pseudo_align_inc_reg1);
