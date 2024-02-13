<?php
class transactionModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getTransactionsByAccountId($accountId)
    {
        try {

            $getTransactionByAccountIdQuery = "SELECT t.`transactionId`, t.`transactionName`, t.`transactionAccountId`, t.`transactionCategoryId`, t.`transactionAmount`, t.`transactionDescription`, t.`transactionCreateDate`, t.`transactionIsActive`, c.`categoryName`
                                               FROM `transactions` t
                                               INNER JOIN `categories` c ON t.`transactionCategoryId` = c.`categoryId`
                                               WHERE t.`transactionIsActive` = 1 AND t.`transactionAccountId` = :transactionAccountId";

            $this->db->query($getTransactionByAccountIdQuery);
            $this->db->bind(':transactionAccountId', $accountId);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to get transactions by account id' . $ex->getMessage());
            return false;
        }
    }

    public function createTransactionByAccountId($newTransaction, $accountId)
    {
        global $var;
        try {

            $createTransactionQuery = "INSERT INTO `transactions`(`transactionId`, `transactionName`, `transactionAccountId`, `transactionCategoryId`, `transactionAmount`, `transactionDescription`, `transactionCreateDate`, `transactionIsActive`) 
                                       VALUES (:transactionId, :transactionName, :transactionAccountId, :transactionCategoryId, :transactionAmount, :transactionDescription, :transactionCreateDate, 1)";


            $this->db->query($createTransactionQuery);
            $this->db->bind(':transactionId', helper::generateRandomString(15));
            $this->db->bind(':transactionAccountId', $accountId);
            $this->db->bind(':transactionName', $newTransaction['transactionName']);
            $this->db->bind(':transactionCategoryId', $newTransaction['transactionCategoryId']);
            $this->db->bind(':transactionAmount', $newTransaction['transactionAmount']);
            $this->db->bind(':transactionDescription', $newTransaction['transactionDescription']);
            $this->db->bind(':transactionCreateDate', $var['timestamp']);

            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to create transaction: ' . $ex->getMessage());
            return false;
        }
        
    }

    public function deleteTransaction($transactionId)
    {
        try {
            $deleteTransaction = "UPDATE `transactions` 
                                SET `transactionIsActive` = '1' 
                                WHERE `transactions`.`transactionId` = :transactionId";
            $this->db->query($deleteTransaction);
            $this->db->bind(':transactionId', $transactionId);

            // Execute the query
            if ($this->db->execute()) {
                helper::log('info', 'transaction has been deleted');
                return true;
            } else {
                helper::log('error', 'transaction could not be deleted');
                return false;
            }
        } catch (PDOException $ex) {
            helper::log('error', 'Exception occurred while deleting transaction: ' . $ex->getMessage());
            return false;
        }
    }
}
