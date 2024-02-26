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
                                            WHERE b.budgetAccountId = :budgetAccountId AND budgetIsActive = 1";

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

    public function getBudgetById($budgetId)
    {
        try {
            $budgetByIdQuery = "SELECT b.budgetId, b.budgetAccountId, b.budgetName, b.budgetAmount, b.budgetIsActive, b.budgetDescription, b.budgetCreateDate, c.categoryName, b.budgetCategoryId
                                FROM budgets b
                                JOIN categories c ON b.budgetCategoryId = c.categoryId
                                WHERE b.budgetId = :budgetId";

            $this->db->query($budgetByIdQuery);
            $this->db->bind(':budgetId', $budgetId);
            return $this->db->single();
        } catch (PDOException $ex) {
            helper::log('error', 'Could not fetch budget by Id' . $ex->getMessage());
            return false;
        }
    }

    public function updateBudget($budgetId, $updatedBudget)
    {
        try {
            $editBudgetQuery = "UPDATE budgets
                                SET budgetCategoryId = :budgetCategoryId,
                                    budgetName = :budgetName,
                                    budgetAmount = :budgetAmount
                                WHERE budgetId = :budgetId";

            $this->db->query($editBudgetQuery);
            $this->db->bind(':budgetId', $budgetId);
            $this->db->bind(':budgetCategoryId', $updatedBudget['budgetCategoryId']);
            $this->db->bind(':budgetName', $updatedBudget['budgetName']);
            $this->db->bind(':budgetAmount', $updatedBudget['budgetAmount']);
            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Could not update the budget' . $ex->getMessage());
            return false;
        }
    }

    public function deleteBudget($budgetId)
    {
        try {
            $deleteBudgetQuery = "UPDATE budgets
                                  SET budgetIsActive = 0 
                                  WHERE budgetId = :budgetId";

            $this->db->query($deleteBudgetQuery);
            $this->db->bind(':budgetId', $budgetId);
            return $this->db->execute();

        } catch (PDOException $ex) {
            helper::log('error', 'could not delete the Budget in budgetModel' . $ex->getMessage());
            return;
        }
    }
}
