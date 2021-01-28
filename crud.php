<?php

include "database.php";

class query extends database
{
    public function getData($table, $field = '*', $condition_arr = null, $order_by_field = null, $order_by_type = 'desc', $limit = null)
    {
        $sql = "select $field from $table";

        if ($condition_arr != null) {
            $sql .= ' where ';
            $count = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $val) {
                if ($count == $i) {
                    $sql.= "$key = '$val'";
                }
                else {
                    $sql.= "$key = '$val' and ";
                }
                $i++;
            }
        }

        if ($order_by_field != null) {
            $sql .= " order by $order_by_field $order_by_type";
        }
        if ($limit != null) {
            $sql .= " limit $limit";
        }

        $result = $this->connect()->query($sql);
        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function insertData($table, $insert)
    {
        $sql = "insert into $table";

        if ($insert) {
            foreach ($insert as $key => $val) {
                $fields[] = $key;
                $values[] = $val;
            }

            $field = implode(",", $fields);
            $value = implode("','", $values);
            $value = "'".$value."'";
            $sql = "insert into $table($field) values($value)";

            $this->connect()->query($sql);
        }
    }
    
    public function deleteData($table, $condition_arr)
    {
        if ($condition_arr) {
            $sql = "delete from $table where";
            $count = count($condition_arr);
            $i = 1;
            foreach ($condition_arr as $key => $value) {
                if ($count == $i) {
                    $sql .= " $key = '$value'";
                }
                else {
                    $sql .= " $key = '$value',";
                }
                $i++;
            }

            $this->connect()->query($sql);
        }
        
    }

    public function updateData($table, $data_arr, $where_field, $where_value)
    {
        if ($data_arr) {
            $sql = "update $table set";

            $count = count($data_arr);
            $i = 1;
            foreach ($data_arr as $key => $value) {
                if ($count == $i) {
                    $sql.=" $key = '$value'";
                }
                else {
                    $sql.= " $key = '$value',";
                }
                $i++;
            }
            $sql.= " where $where_field = '$where_value'";
            $this->connect()->query($sql);
            // return $sql;
        }
    }

    public function get_safe_str($str)
    {
        return mysqli_real_escape_string($this->connect(), $str);
    }
}