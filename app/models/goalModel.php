<?php
class goalModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getGoalsByAccountId($accountId)
    {
        try {

            $getGoalsByAccountIdQuery = "SELECT `goalId`, `goalAccountId`, `goalName`, `goalAmount`, `goalIsActive`, `goalDescription`, `goalCreateDate` 
                                         FROM `goals` 
                                         WHERE `goalIsActive` = 1 AND `goalAccountId` = :goalAccountId";
            $this->db->query($getGoalsByAccountIdQuery);
            $this->db->bind(':goalAccountId', $accountId);
            return $this->db->single();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to get goals by account id' . $ex->getMessage());
            return false;
        }
    }

    public function createGoalByAccountId($newGoal, $accountId)
    {
        global $var;
        try {

            $createGoalByAccountIdQuery = "INSERT INTO `goals`(`goalId`, `goalAccountId`, `goalName`, `goalAmount`, `goalIsActive`, `goalDescription`, `goalCreateDate`) 
                                           VALUES(:goalId, :goalAccountId,:goalName, :goalAmount, 1, :goalDescription, :goalCreateDate)";
            $this->db->query($createGoalByAccountIdQuery);
            $this->db->bind(':goalId', helper::generateRandomString(15));
            $this->db->bind(':goalAccountId', $accountId);
            $this->db->bind(':goalName', $newGoal['goalName']);
            $this->db->bind(':goalAmount', $newGoal['goalAmount']);
            $this->db->bind(':goalDescription', $newGoal['goalDescription']);
            $this->db->bind(':goalCreateDate', $var['timestamp']);
            return $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Failed to create goal' . $ex->getMessage());
            return false;
        }
    }

    public function deleteGoal($goalId)
    {
        try {
            $deleteGoal = "UPDATE `goals` 
                                SET `goalIsActive` = '1' 
                                WHERE `goals`.`goalId` = :goalId";
            $this->db->query($deleteGoal);
            $this->db->bind(':goalId', $goalId);
            $this->db->execute();
        } catch (PDOException $ex) {
            helper::log('error', 'Exception occurred while deleting goal: ' . $ex->getMessage());
            return false;
        }
    }
}
