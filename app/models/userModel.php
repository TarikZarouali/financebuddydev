<?php
class userModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function register($newUser)
    {
        global $var;
        try {
            $createUserQuery = "INSERT INTO `users`(`userId`, `userFirstName`, `userLastName`, `userUserName`, `userPassword`, `userEmail`, `userType`, `userIsActive`, `userCreateDate`)
                                VALUES (:userId, :userFirstName, :userLastName, :userUserName, :userPassword, :userEmail, 'user', 1, :userCreateDate)";
            $this->db->query($createUserQuery);
            $this->db->bind(':userId', helper::generateRandomString(15));
            $this->db->bind(':userFirstName', $newUser['userFirstName']);
            $this->db->bind(':userLastName', $newUser['userLastName']);
            $this->db->bind(':userUserName', $newUser['userUserName']);
            $this->db->bind(':userPassword', $newUser['userPassword']);
            $this->db->bind(':userEmail', $newUser['userEmail']);
            $this->db->bind(':userCreateDate', $var['timestamp']);

            return $this->db->execute();
        } catch (PDOException $ex) {
            Helper::log('error', ' Failed to register User' . $ex->getMessage());
            return false;
        }
    }

    public function checkUserExist($userUserName, $password)
    {
        try {
            $loginQuery = "SELECT `userId`, `userFirstName`, `userLastName`, `userUserName`, `userPassword`, `userEmail`, `userType`, `userIsActive`, `userCreateDate`
                           FROM `users`
                           WHERE `userUserName` = :userUserName
                           AND `userPassword` = :userPassword";

            $this->db->query($loginQuery);
            $this->db->bind(":userUserName", $userUserName);
            $this->db->bind(":userPassword", $password);

            // Return the result of the query
            return $this->db->single();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to login user' . $ex->getMessage());
            return false;
        }
    }

    public function checkUserType($userType)
    {
        try {
            $checkUserTypeQuery = "SELECT `userType`
                               FROM `users`
                               WHERE `userType` = :userType";
            $this->db->query($checkUserTypeQuery);
            $this->db->bind(":userType", $userType);

            $result = $this->db->single();

            return !empty($result); // Return true if user with the specified type exists
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to check user type' . $ex->getMessage());
            return false;
        }
    }

    public function getAccountsByUserId($userId)
    {
        try {

            $getAccountsByUserIdQuery = "SELECT `accountId`, `accountUserId`, `accountName`, `accountBalance`, `accountType`,`accountIsActive`, `accountCreateDate`, `accountDescription` 
                                        FROM `accounts` 
                                        INNER JOIN `users` 
                                        ON `accountUserId` = `userId` 
                                        WHERE `accountUserId` = :accountUserId 
                                        AND `accountIsActive` = 1";

            $this->db->query($getAccountsByUserIdQuery);
            $this->db->bind(":accountUserId", $userId);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to get accounts by user id' . $ex->getMessage());
            return false;
        }
    }

   
}
