<?php
class categoryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getActiveCategories()
    {
        try {

            $getActiveCategories = "SELECT `categoryId`, `categoryName`, `categoryDescription`, `categoryIsActive` 
                                    FROM `categories` 
                                    WHERE `categoryIsActive` = 1";

            $this->db->query($getActiveCategories);
            return $this->db->resultSet();
        } catch (Exception $ex) {
            helper::log('error', 'could not get active categories' . $ex->getMessage());
            return;
        }
    }

   
}
