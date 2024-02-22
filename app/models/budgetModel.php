<?php

class budgetModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getActiveBudgetsByAccountId($accountId)
    {
        try {
            $getActiveBudgetsByAccountId = "SELECT b.budgetId, b.budgetName, b.budgetAmount, b.budgetIsActive, b.budgetDescription, b.budgetCreateDate, c.categoryName, b.budgetCategoryId
                                            FROM budgets b
                                            JOIN categories c ON b.budgetCategoryId = c.categoryId
                                            WHERE b.budgetAccountId = :budgetAccountId";

            $this->db->query($getActiveBudgetsByAccountId);
            $this->db->bind(':budgetAccountId', $accountId);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            helper::log('error', 'Could not get active budgets' . $ex->getMessage());
            return [];
        }
    }

    public function createBudgetByAccountId($accountId, $newBudget)
    {
        global $var;

        try {
            $createBudgetQuery = "INSERT INTO `budgets`(`budgetId`,`budgetAccountId`, `budgetCategoryId`,`budgetName`,`budgetAmount`,`budgetIsActive`,`budgetDescription`,`budgetCreateDate`)
                              VALUES (:budgetId, :budgetAccountId, :budgetCategoryId, :budgetName, :budgetAmount, 1, :budgetDescription, :budgetCreateDate)";

            $this->db->query($createBudgetQuery);
            $this->db->bind(':budgetId', helper::generateRandomString(15));
            $this->db->bind(':budgetAccountId', $accountId);
            $this->db->bind(':budgetCategoryId', $newBudget['budgetCategoryId']);
            $this->db->bind(':budgetName', $newBudget['budgetName']);
            $this->db->bind(':budgetAmount', $newBudget['budgetAmount']);
            $this->db->bind(':budgetDescription', $newBudget['budgetDescription']);
            $this->db->bind(':budgetCreateDate', $var['timestamp']);

            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'failed to create a budget by account Id' . $ex->getMessage());
            return false; // Return false in case of an error
        }
    }
}
