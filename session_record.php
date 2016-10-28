<?php

 //echo session_record;exit;
/**http://culttt.com/2013/02/04/how-to-save-php-sessions-to-a-database/
 * Open
 */

/*

CREATE TABLE sessions
(
    id varchar(32) NOT NULL,
    access int(10) unsigned,
    data text,
    PRIMARY KEY (id)
);

+--------+------------------+------+-----+---------+-------+
| Field  | Type             | Null | Key | Default | Extra |
+--------+------------------+------+-----+---------+-------+
| id     | varchar(32)      |      | PRI |         |       |
| access | int(10) unsigned | YES  |     | NULL    |       |
| data   | text             | YES  |     | NULL    |       |
+--------+------------------+------+-----+---------+-------+

*/
 
session_set_save_handler('_open',
                         '_close',
                         '_read',
                         '_write',
                         '_destroy',
                         '_clean');

function _open()
{
    global $_sess_db;
    //mysql_connect("localhost:8889", "root", "root") or
    //die("Could not connect: " . mysql_error());

    $db_user = $_SERVER['root'];
    $db_pass = $_SERVER['root'];
    $db_host = 'localhost:8889';
   
    if ($_sess_db = mysql_connect("localhost:8889", "root", "root"))
    {
        return mysql_select_db('sessions', $_sess_db);
    }
    
    return FALSE;
}

function _close()
{
    global $_sess_db;
    
    return mysql_close($_sess_db);
}

function _read($id)
{
    global $_sess_db;

    $id = mysql_real_escape_string($id);

    $sql = "SELECT data
            FROM   sessions
            WHERE  id = '$id'";

    if ($result = mysql_query($sql, $_sess_db))
    {
        if (mysql_num_rows($result))
        {
            $record = mysql_fetch_assoc($result);

            return $record['data'];
        }
    }

    return '';
}

function _write($id, $data)
{   
    
    global $_sess_db;

    $access = time();

    $id = mysql_real_escape_string($id);
    $access = mysql_real_escape_string($access);
    $data = mysql_real_escape_string($data);

    $sql = "REPLACE 
            INTO    sessions
            VALUES  ('$id', '$access', '$data')";

    return mysql_query($sql, $_sess_db);
}

function _destroy($id)
{
    global $_sess_db;
    
    $id = mysql_real_escape_string($id);

    $sql = "DELETE
            FROM   sessions
            WHERE  id = '$id'";

    return mysql_query($sql, $_sess_db);
}

function _clean($max)
{
    global $_sess_db;
    
    $old = time() - $max;
    $old = mysql_real_escape_string($old);

    $sql = "DELETE
            FROM   sessions
            WHERE  access < '$old'";

    return mysql_query($sql, $_sess_db);
}
 
 
 
 
?>
