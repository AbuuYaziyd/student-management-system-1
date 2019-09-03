<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function verifyEmail($table, $parameters)
    {
        die(var_dump($parameters));
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE email = {$parameters['email']}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function queryDynamic($table, $params)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$this->keyValueStringWithAnd($params)}");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function insert ($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch(Exception $e){
                die($e->getMessage());
        }
    }

    public function update($table, $params)
    {
        $id = array_shift($params);
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id=%s',
            $table,
            $this->keyValueStringWithComma($params),
            $id
        );

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        }catch(Exception $e){
            die('Error in update');
        }
    }

    public function deleteStudent($id)
    {
        $id = implode($id);
        $statement = $this->pdo->prepare(
            "SELECT * 
            FROM students s LEFT JOIN courses_students cs 
            ON s.id = cs.student_id
            WHERE s.id={$id}");
        $statement->execute();
        $left_join_query = $statement->fetchAll(PDO::FETCH_OBJ);
        
        if($left_join_query[0]->course_id != NULL){
            $this->delete_query_courses_students($left_join_query);
        }
        $this->delete_row_table('students', $id);
    }

    protected function delete_query_courses_students($query)
    {
        foreach($query as $element){
            $sql = sprintf(
                "DELETE FROM courses_students 
                WHERE student_id=%s AND course_id=%s",
                $element->student_id,
                $element->course_id
            );
            try{
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }catch(Exception $e){
                die("PDO Exception cant delete courses_students");
            }
        }
    }

    protected function delete_row_table($table, $id)
    {
        $sql = sprintf(
            "DELETE FROM %s WHERE id=%s",
            $table,
            $id
        );
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        }catch(Exception $e){
            die('Woops, PDO Exception there is error during deleting student');
        }
    }

    public function running_courses($table)
    {
        $statement = $this->pdo->prepare("SELECT id, name FROM courses WHERE CURRENT_DATE <= end_date;");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function running_course_with_students()
    {
        $statement = $this->pdo->prepare("SELECT c.id, c.name, c.start_date, c.end_date, COUNT(cs.student_id) AS no_of_students
                                        FROM courses c LEFT JOIN courses_students cs
                                        ON c.id = cs.course_id
                                        WHERE CURRENT_DATE <= end_date
                                        GROUP BY c.id, c.name, c.start_date, c.end_date;"
                                        );
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function past_course_with_students()
    {
        $statement = $this->pdo->prepare("SELECT c.id, c.name, c.start_date, c.end_date, COUNT(cs.student_id) AS no_of_students
                                        FROM courses c LEFT JOIN courses_students cs
                                        ON c.id = cs.course_id
                                        WHERE CURRENT_DATE >= end_date
                                        GROUP BY c.id, c.name, c.start_date, c.end_date;"
                                        );
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    protected function keyValueStringWithAnd($params)
    {
        $query = "";
        $count = 1;
        foreach($params as $key => $param)
        {
            if($count < count($params)) {
                $query .= sprintf("%s='%s' && ", $key, $param);
            } else{
                $query .= sprintf("%s='%s'", $key, $param);
            }
            $count++;
        }
        return $query;
    }

    protected function keyValueStringWithComma($params)
    {
        $query = "";
        $count = 1;
        foreach($params as $key => $param)
        {
            if($count < count($params)) {
                $query .= sprintf("%s='%s', ", $key, $param);
            } else{
                $query .= sprintf("%s='%s'", $key, $param);
            }
            $count++;
        }
        return $query;
    }

}