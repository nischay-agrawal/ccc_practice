<pre>
<?php
class View_Category
{
    public function __construct()
    {

    }

    public function addCategory()
    {

        $form = '<form action="" method="POST">';
            $form .= '<h2>Add Category</h2>';
            $form .= '<div>';
	    	    $form .= $this->createTextField('cdata[name]', "Category Name: ");
	        $form .= '</div>';
            $form .= '<div>';
	        	$form .= $this->createSubmitBtn('Submit');
	        $form .= '</div>';
        $form .= '</form>';
		return $form;
    }

    public function createTextField($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }
    public function createSubmitBtn($title)
    {
        return '<input type="submit" name="submit" value="'.$title.'">';
    }
    public function toHtml()
    {
    	return $this->addCategory();
    }

}
?>