$(document).ready(function() {
    var max_fields      = 500; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var text ='<tr><td><input type="text" name="name[]" value=""></td><td><input list="types" name="type[]"><datalist id="types">'+
                '<option value="CHAR">CHAR</option><option value="NCHAR">NCHAR</option><option value="VARCHAR">VARCHAR</option><option value="VARCHAR2">VARCHAR2</option><option value="NVARCHAR2">NVARCHAR2</option><option value="CLOB">CLOB</option><option value="NCLOB">NCLOB</option><option value="LONG">LONG</option>'+
              '<option value="NUMBER">NUMBER</option><option value="DATE">DATE</option><option value="INTERVAL DAY TO SECOND">INTERVAL DAY TO SECOND</option><option value="INTERVAL YEAR TO MONTH">INTERVAL YEAR TO MONTH</option><option value="TIMESTAMP">TIMESTAMP</option><option value="TIMESTAMP WITH TIME ZONE">TIMESTAMP WITH TIME ZONE</option><option value="TIMESTAMP WITH LOCAL TIME ZONE">TIMESTAMP WITH LOCAL TIME ZONE</option><option value="BLOB">BLOB</option><option value="BFILE">BFILE</option><option value="RAW">RAW</option><option value="LONG RAW">LONG RAW</option>'+
              '</datalist></td><td><input type="number" name="size[]" value=""></td><td><input type="text" name="default[]" value="null"></td></tr>';
            $(wrapper).prepend('<div>'+text+'<a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
