<?php

class Main {

    public static function GetDB()
    {
        return new SQLite3('database.db');
    }

    public static function AddStudent($fullname)
        {
            $db = self::GetDB();
            $stmt = $db->prepare('INSERT INTO students(fullname) VALUES(:fullname)');
            $stmt->bindValue(':fullname', $fullname, SQLITE3_TEXT);
            $result = $stmt->execute();
        }

        public static function DeleteStudent($id)
        {
            $db = self::GetDB();
            $stmt = $db->prepare('DELETE FROM students WHERE id = :id');
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            $result = $stmt->execute();
        }

        public static function GetStudents()
        {
            $db = self::GetDB();
            $res = $db->query('SELECT * FROM students');
            $empty_result = true;
            $students_amount = 0;
            echo '<table class="center">';
            while ($row = $res->fetchArray())
            {
                echo '
                '. $row["fullname"].'
                <button><a href="delete_student.php?id='.$row["id"].'">Delete</button></a><br>
                ';
            }
        }

        public static function Randomize()
        {
            $db = self::GetDB();
            $res = $db->query('SELECT * FROM students ORDER BY RANDOM()');

            $size = 0;
            $team = 1;
            echo ' Team '.$team.': ';
            echo '<p>';
            while ($row = $res->fetchArray())
            {
	            if($size == 3)
	            {
		            echo '<p>';
		            $team++;
		            echo ' Team '.$team.': ';
		            echo '<p>';
		            $size = 0;
	             }

	                echo ' '.$row ["id"].')  '.$row["fullname"].' ';
	                $size++;
            }

        }

        
}