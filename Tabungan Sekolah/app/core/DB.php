<?php

class DB
{
    // koneksi database
    public static function getDB()
    {
        return mysqli_connect(DB_host, DB_user, DB_pass, DB_name);
    }

    public static function query($query)
    {
        return mysqli_query(DB::getDB(), $query);
    }

    public static function resultAll($query)
    {
        $result = DB::query($query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function row($query)
    {
        $result = DB::query($query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public static function insert($table, $data)
    {
        $query = "INSERT INTO $table VALUES $data";
        DB::query($query);
    }

    public static function delete($table, $where, $data_where)
    {
        DB::query("DELETE FROM $table WHERE $where = $data_where");
    }

    public static function update($table, $update, $where, $data_where)
    {
        DB::query("UPDATE $table SET $update WHERE $where = $data_where");
    }
}
