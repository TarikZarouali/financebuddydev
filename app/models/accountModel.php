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
                                VALUES (:accountId, :accountUserId, :accountName, :accountBalance, :accountType, :accountGoal, 1, :accountCreateDate, :accountDescription)";

            $this->db->query($createAccountQuery);
            $this->db->bind(':accountId', helper::generateRandomString(15));
            $this->db->bind(':accountUserId', $userId); // Use the provided user ID
            $this->db->bind(':accountName', $newAccount['accountName']);
            $this->db->bind(':accountBalance', $newAccount['accountBalance']);
            $this->db->bind(':accountType', $newAccount['accountType']);
            $this->db->bind(':accountGoal', $newAccount['accountGoal']);
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
}
