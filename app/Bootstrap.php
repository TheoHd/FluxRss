<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 15/11/2017
 * Time: 21:10
 */

namespace App;


class Bootstrap
{
    public function inputBsp($type, $name, $content)
    {

        $html = "<div class='form-group'>";
        $html .= "<label for='" . $name . "'>" . $content . "</label>";
        $html .= "<input class='form-control' id='" . $name . "' name='" . $name . "' type='" . $type . "'>";
        $html .= "</div>";

        return $html;
    }

    public function submitBsp($class, $content, $name)
    {
        $html = "<div class='form-group'>";
        $html .= "<button class='" . $class . "' type='" . $name . "' name='" . $name . "' id='" . $name . "'>";
        $html .= $content;
        $html .= "</button>";
        $html .= "</div>";

        return $html;
    }

    public function selectBsp($name, $values)
    {

        $html = "<select class='' name='" . $name . "' id='" . $name . "'> ";
        $i = 1;
        foreach ($values as $value) {
            $html .= "<option value='" . $i . "'>" . $value . "</option>";
            $i++;
        }

        $html .= "</select>";

        return $html;
    }

    public function textareaBsp($name, $value)
    {
        $html = "<textarea name='" . $name . "' id='" . $name . "'> ";
        $html .= $value;
        $html .= "</textarea>";

        return $html;
    }

    public function checkboxBsp($name, $value)
    {

        $html = "<p>";
        $html .= " <input type='" . $name . "' id='" . $name . "' />";
        $html .= " <label for='" . $name . "'>" . $value . "</label>";
        $html .= "</p>";

        return $html;
    }

    public function radioBsp($label, $name, $values, $options = [])
    {

        $constructor = '';

        foreach ($options as $k => $v) {
            $constructor .= " $k = '$v' ";
        }

        $html = "<div class='radio'> $label";

        foreach ($values as $value) {

            $html .= "<label>";
            $html .= "<input type='radio' $constructor name='" . $name . "' id='$name' value='" . $value . "'>";
            $html .= $value;
            $html .= "</label>";

        }

        $html .= "</div>";

        return $html;
    }
}