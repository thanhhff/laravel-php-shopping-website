<?php

namespace App\Components;

class Recursive
{
    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    function categoryRecursive($parentID, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentID) && $parentID == $value['id'])
                    $this->htmlSelect .= "<option selected value = '" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                else
                    $this->htmlSelect .= "<option value = '" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                $this->categoryRecursive($parentID, $value['id'], $text . '--');
            }
        }

        return $this->htmlSelect;
    }

}
