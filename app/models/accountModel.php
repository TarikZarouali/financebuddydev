<?php
class accountModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createAccount($newAccount, $userId)
    {
        global $var;

        try {
            $createAccountQuery = "INSERT INTO `accounts`(`accountId`, `accountUserId`, `accountName`, `accountBalance`, `accountType`, `accountGoal`, `accountIsActive`, `accountCreateDate`, `accountDescription`)
                                VALUES (:accountId, :accountUserId, :accountName, :accountBalance, :accountType, NULL, 1, :accountCreateDate, :accountDescription)";

            $this->db->query($createAccountQuery);
            $this->db->bind(':accountId', helper::generateRandomString(15));
            $this->db->bind(':accountUserId', $userId); // Use the provided user ID
            $this->db->bind(':accountName', $newAccount['accountName']);
            $this->db->bind(':accountBalance', $newAccount['accountBalance']);
            $this->db->bind(':accountType', $newAccount['accountType']);
            $this->db->bind(':accountCreateDate', $var['timestamp']);
            $this->db->bind(':accountDescription', $newAccount['accountDescription']);

            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to create account' . $ex->getMessage());
            return false;
        }
    }

    public function deleteAccount($accountId)
    {
        try {
            $deleteAccount = "UPDATE `accounts` 
                                SET `accountIsActive` = '0' 
                                WHERE `accounts`.`accountId` = :accountId";
            $this->db->query($deleteAccount);
            $this->db->bind(':accountId', $accountId);

            // Execute the query
            if ($this->db->execute()) {
                helper::log('info', 'account has been deleted');
                return true;
            } else {
                helper::log('error', 'account could not be deleted');
                return false;
            }
        } catch (PDOException $ex) {
            helper::log('error', 'Exception occurred while deleting account: ' . $ex->getMessage());
            return false;
        }
    }

    public function getAccountById($accountId)
    {
        try {
            $getAccountByIdQuery = "SELECT `accountId`, `accountUserId`, `accountName`, `accountBalance`, `accountType`, `accountGoal`, `accountIsActive`, `accountCreateDate`, `accountDescription` 
                                    FROM `accounts` 
                                    WHERE `accountIsActive` = 1 AND `accountId` = :accountId";

            $this->db->query($getAccountByIdQuery);
            $this->db->bind(":accountId", $accountId);
            return $this->db->single();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to get account by id' . $ex->getMessage());
            return false;
        }
    }

    public function updateAccount($accountId, $updatedAccount)
    {
        try {
            $updateAccountQuery = "UPDATE `accounts` 
                                    SET `accountName` = :accountName, 
                                        `accountBalance` = :accountBalance, 
                                        `accountType` = :accountType, 
                                        `accountDescription` = :accountDescription
                                    WHERE `accounts`.`accountId` = :accountId";
                                    
            $this->db->query($updateAccountQuery);
            $this->db->bind(':accountId', $accountId);
            $this->db->bind(':accountName', $updatedAccount['accountName']);
            $this->db->bind(':accountBalance', $updatedAccount['accountBalance']);
            $this->db->bind(':accountType', $updatedAccount['accountType']);
            $this->db->bind(':accountDescription', $updatedAccount['accountDescription']);
            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'could not update account. Error: ' . $ex->getMessage());
            return false;
        }
    }
}
