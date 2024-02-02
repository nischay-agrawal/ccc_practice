<?php
class View_Category
{
    public function __construct()
    {

    }

    public function addCategory()
    {
        $form = '<form action="" method="POST">';
            $form .= '<h2>Add Details</h2>';
            $form .= '<div>';
	    	$form .= $this->createTextField('pdata[product_name]', "Product Name: ");
	        $form .= '</div>';
        $form .= '</form>';
		return $form;
    }

    public function createTextField($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }
}
?>