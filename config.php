<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

final class Config
{
//    const TNS="oci:dbname=(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=oracle-database-server.codh4fxrj7f0.us-west-2.rds.amazonaws.com)(PORT=1521))(CONNECT_DATA=(SID=ORCL)))";
    const TNS="oci:dbname=(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=oracle-database-server.ce4fkadxhaij.us-west-2.rds.amazonaws.com)(PORT=1521))(CONNECT_DATA=(SID=ORCL)))";

    const SYSTEM_TABLES=array("System Privileges"=>"sys_privileges","Role privileges"=>"role_privileges","Table privileges"=>"tab_privileges","Schemas"=>"schemas","Tables"=>"tables","Functions"=>"functions","Triggers"=>"triggers","Procedures"=>"procedures");

}
