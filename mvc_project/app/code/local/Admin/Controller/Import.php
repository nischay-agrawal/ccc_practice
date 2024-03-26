<?php

class Admin_Controller_Import extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("content")->addChild("form", Mage::getBlock("core/template")->setTemplate("import/form.phtml"));
        $layout->toHtml();
    }
    public function importAction()
    {

    }
    public function uploadAction()
    {
        if (isset ($_FILES['csvfile']) && $_FILES['csvfile']['error'] == 0) {
            $file_name = Mage::uploadFile($_FILES['csvfile'], 'csv/');
            if (isset ($file_name)) {
                $file = fopen(Mage::getBaseDir("media/csv/" . $file_name), 'r');
                $header = fgetcsv($file);
                while (!feof($file)) {
                    $row = fgetcsv($file);
                    if (is_array($row)) {
                        $data = $this->dataToJson($header, $row);
                        Mage::getModel("import/import")->addData('json_data', $data)
                            ->addData('status', 0)
                            ->save();
                    }
                }
                fclose($file);
                echo "CSV file uploaded and data stored in middle table successfully.";
            }
        } else {
            echo "Error uploading CSV file.";
        }
        $this->setRedirect("admin/import/list");
    }

    protected function dataToJson($header, $data)
    {
        $json = array();
        foreach ($data as $k => $d) {
            $json[$header[$k]] = $d;
        }
        return json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public function importDataAction()
    {
        $importData = Mage::getModel("import/import")->getCollection()->addFieldToFilter('status', 0)->getData();
        foreach ($importData as $data) {
            $jsonData = json_decode($data->getJsonData(), true);
            try {
                Mage::getModel("catalog/product")->setData($jsonData)->save();
                $data->addData("status", 1)->save();
            } catch (Exception $e) {
                $data->addData("status", 2)->save();
                echo $e->getMessage();
            }
        }
        echo "Import process completed.";
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("content")->addChild("list", Mage::getBlock("core/template")->setTemplate("import/list.phtml"));
        $layout->toHtml();
    }
}