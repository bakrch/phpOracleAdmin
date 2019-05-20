<body>
  <link rel="stylesheet" href="../css/styleTable.css">

  <script language="JavaScript" type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="../js/createTable.js"></script>
  <form class="" action="" method="post">


    <table class="table table-list-search table-hover table-mc-light-blue">
<button class="add_field_button">Add More Fields</button>
      <thead>
        <br><br><br><label for="">Nom de la table:&nbsp&nbsp&nbsp </label>
        <input type="text" name="table_name" value=""><br><br>
        <tr>
          <th>Column name</th>
          <th>Type</th>
          <th>Size</th>
          <th>Default value</th>
        </tr>
      </thead>


        <tbody>
<div>
    <tr>
        <td><input type="text" name="name[]" value=""></td>
        <td><input list="types" name="type[]"><datalist id="types">
          <option value="CHAR">CHAR</option>
          <option value="NCHAR">NCHAR</option>
          <option value="VARCHAR">VARCHAR</option>
          <option value="VARCHAR2">VARCHAR2</option>
          <option value="NVARCHAR2">NVARCHAR2</option>
          <option value="CLOB">CLOB</option>
          <option value="NCLOB">NCLOB</option>
          <option value="LONG">LONG</option>
          <option value="NUMBER">NUMBER</option>
          <option value="DATE">DATE</option>
          <option value="INTERVAL DAY TO SECOND">INTERVAL DAY TO SECOND</option>
          <option value="INTERVAL YEAR TO MONTH">INTERVAL YEAR TO MONTH</option>
          <option value="TIMESTAMP">TIMESTAMP</option>
          <option value="TIMESTAMP WITH TIME ZONE">TIMESTAMP WITH TIME ZONE</option>
          <option value="TIMESTAMP WITH LOCAL TIME ZONE">TIMESTAMP WITH LOCAL TIME ZONE</option>
          <option value="BLOB">BLOB</option>
          <option value="BFILE">BFILE</option>
          <option value="RAW">RAW</option>
          <option value="LONG RAW">LONG RAW</option>
          </datalist></td>
        <td><input type="number" name="size[]" value=""></td>
        <td><input type="text" name="default[]" value="null"></td>
      </tr>

        <tr>
          <div class="input_fields_wrap"></div>
        </tr>

      </tbody>

      </table>
</div>
<tfoot>
  <input type="submit" name="create" value="Create">
</tfoot>
  </form>

</body>
