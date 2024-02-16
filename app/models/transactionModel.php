<?php
class transactionModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getTransactionsByAccountId($accountId, $categoryFilter = 0, $transactionType = '')
    {
        try {
            // Base query
            $getTransactionByAccountIdQuery = "SELECT t.transactionId, t.transactionName, t.transactionAccountId, t.transactionCategoryId, t.transactionAmount, t.transactionDescription, t.transactionCreateDate, t.transactionIsActive,c.categoryId, c.categoryName
                                       FROM transactions as t
                                       INNER JOIN categories as c ON t.transactionCategoryId = c.categoryId
                                       WHERE t.transactionIsActive = 1 AND t.transactionAccountId = :transactionAccountId";

            // Append category filter condition if a specific category is selected
            if (!empty($categoryFilter)) {
                $getTransactionByAccountIdQuery .= " AND t.transactionCategoryId = :categoryFilter";
            }

            // Append transaction type condition if a specific type is selected
            if ($transactionType === 'income') {
                $getTransactionByAccountIdQuery .= " AND t.transactionAmount > 0";
            } elseif ($transactionType === 'expense') {
                $getTransactionByAccountIdQuery .= " AND t.transactionAmount < 0";
            }

            // Prepare and execute the query
            $this->db->query($getTransactionByAccountIdQuery);
            $this->db->bind(':transactionAccountId', $accountId);

            // Bind category filter parameter if applicable
            if (!empty($categoryFilter)) {
                $this->db->bind(':categoryFilter', $categoryFilter);
            }

            return $this->db->resultSet();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to get transactions by account id' . $ex->getMessage());
            return false;
        }
    }


    public function getTransactionsByPagination($offset, $limit)
    {
        try {
            $getTransactionsByPaginationQuery = "SELECT t.`transactionId`, t.`transactionName`, t.`transactionAccountId`, t.`transactionCategoryId`, t.`transactionAmount`, t.`transactionDescription`, t.`transactionCreateDate`, t.`transactionIsActive`, c.`categoryName`
                                                 FROM `transactions` t
                                                 INNER JOIN `categories` c ON t.`transactionCategoryId` = c.`categoryId`
                                                 WHERE t.`transactionIsActive` = 1 AND t.`transactionAccountId` = :transactionAccountId
                                                LIMIT :offset, :limit";

            $this->db->query($getTransactionsByPaginationQuery);
            $this->db->bind(':offset', $offset);
            $this->db->bind(':limit', $limit);
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to get transactions by pagination' . $ex->getMessage());
            return false;
        }
    }

    public function getTransactionsById($transactionId)
    {
        try {

            $getTransactionByAccountIdQuery = "SELECT t.`transactionId`, t.`transactionName`, t.`transactionAccountId`, t.`transactionCategoryId`, t.`transactionAmount`, t.`transactionDescription`, t.`transactionCreateDate`, t.`transactionIsActive`, c.`categoryName`
                                               FROM `transactions` t
                                               INNER JOIN `categories` c ON t.`transactionCategoryId` = c.`categoryId`
                                               WHERE t.`transactionIsActive` = 1 AND t.`transactionId` = :transactionId";

            $this->db->query($getTransactionByAccountIdQuery);
            $this->db->bind(':transactionId', $transactionId);
            return $this->db->single();
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
                                SET `transactionIsActive` = '0' 
                                WHERE transactions.transactionId = :transactionId";
            $this->db->query($deleteTransaction);
            $this->db->bind(':transactionId', $transactionId);

            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Exception occurred while deleting transaction: ' . $ex->getMessage());
            return false;
        }
    }

    public function updateTransaction($transactionId, $newTransaction)
    {
        try {
            $updateTransaction = "UPDATE `transactions` 
                                SET `transactionName` = :transactionName, 
                                    `transactionCategoryId` = :transactionCategoryId,
                                    `transactionAmount` = :transactionAmount,
                                    `transactionDescription` = :transactionDescription
                                WHERE transactions.transactionId = :transactionId";
            $this->db->query($updateTransaction);
            $this->db->bind(':transactionId', $transactionId);
            $this->db->bind(':transactionName', $newTransaction['transactionName']);
            $this->db->bind(':transactionCategoryId', $newTransaction['transactionCategoryId']);
            $this->db->bind(':transactionAmount', $newTransaction['transactionAmount']);
            $this->db->bind(':transactionDescription', $newTransaction['transactionDescription']);
            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Exception occurred while updating transaction: ' . $ex->getMessage());
            return false;
        }
    }
}
