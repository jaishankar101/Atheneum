<?php
class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($fname, $dob, $num)
    {
        try {
            $sql = "INSERT INTO DETAILS VALUES(:fname,:dob,:num)";
            $stmt = $this->db->prepare($sql);;
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':num', $num);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
