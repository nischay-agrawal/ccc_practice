<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        padding: 40px 0;

    form {
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        max-width: 600px;
        width: 90%;
        margin: 0 auto;

    h2 {
        color: #333;
        margin-bottom: 20px;
        text-align: center;
        font-size: 24px;

    div {
        margin-bottom: 20px;

    span {
        display: block;
        margin-bottom: 10px;
        color: #333;
        font-weight: 600;

    input[type=text], input[type=date], select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-top: 4px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;

    .radio-group input[type=radio] {
        margin-right: 5px;
        margin-top: 0;

    .radio-group label {
        margin-right: 15px;
        font-size: 14px;
        color: #333;
        font-weight: normal;

    input[type=submit] {
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;

    input[type=submit]:hover {
        background-color: #0056b3;

    @media (max-width: 768px) {
        form {
            width: 95%;
            padding: 15px;
        }
    }
</style>
<pre>
<?php
class View_Product
{
    public function __construct()
    {

    }

    public function createForm()
    {
        $form = '<form action="" method="POST">';
            $form .= '<h2>Add Details</h2>';
        	$form .= '<div>';
	        	$form .= $this->createTextField('pdata[product_name]', "Product Name: ");
	        $form .= '</div>';
	        $form .= '<div>';
	        	$form .= $this->createTextField('pdata[sku]', "SKU: ");
	        $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createRadioBtn('pdata[product_type]', "ProductType: ", ['Simple', 'Bundle']);
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createDropdownMenu('pdata[category]', "Category: ", ['Bar & Game Room', 'Bedroom', 'Decor', 'Dining and Kitchen', 'Lighting', 'Living Room', 'Mattresses', 'Office', 'Outdoor']);
            $form .= '</div>';
	        $form .= '<div>';
                $form .= $this->createTextField('pdata[manufacturer_cost]', "Manufacturer Cost: ");
	        $form .= '</div>';
	        $form .= '<div>';
                $form .= $this->createTextField('pdata[shipping_cost]', "Shipping Cost: ");
	        $form .= '</div>';
	        $form .= '<div>';
                $form .= $this->createTextField('pdata[total_cost]', "Total Cost: ");
	        $form .= '</div>';
	        $form .= '<div>';
	        	$form .= $this->createTextField('pdata[price]', "Price: ");
	        $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createDropdownMenu('pdata[status]', "Status: ", ['Enabled', 'Disabled']);
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createDateInput('pdata[created_at]', "Created At: ");
            $form .= '</div>';
            $form .= '<div>';
                $form .= $this->createDateInput('pdata[updated_at]', "Updated At: ");
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

    public function createRadioBtn($name, $title, $values, $default = 'Simple')
    {
        $radioBtns = '<span> ' . $title . ' </span>';
        foreach ($values as $value) {
            $checked = ($value == $default) ? 'checked' : '';
            $radioBtns .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '> ' . $value . ' ';
        }
        return $radioBtns;
    }

    public function createDropdownMenu($name, $title, $options)
    {
        $dropdown = '<span> ' . $title . ' </span>';
        $dropdown .= '<select name="' . $name . '">';
        foreach ($options as $option) {
            $dropdown .= '<option value="' . $option . '">' . $option . '</option>';
        }
        $dropdown .= '</select>';
        return $dropdown;
    }

    public function createDateInput($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="date" name="' . $name . '" value="' . $value . '">';
    }

    public function createSubmitBtn($title)
    {
        return '<input type="submit" name="submit" value="'.$title.'">';
    }

    public function toHtml()
    {
    	return $this->createForm();
    }
}
