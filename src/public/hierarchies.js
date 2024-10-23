    var the_button_id = 0;
    function toggleForm(formid){
        the_button_id = formid;
        theform = document.getElementById('addition-form');
        thebutton = document.getElementById('button-'+formid);
        old_state = theform.style.display;
        new_form_state = (old_state == 'inline') ? 'none' : 'inline';
        new_button_state = (old_state == 'inline') ? 'inline' : 'none';
        theform.style.display = new_form_state;
        thebutton.style.display = new_button_state;
        
        if(new_form_state == 'inline'){
            theform.reports_to.value = formid;
            document.getElementById('hierarchies').style.opacity='0.1';
            document.getElementById('button-0').style.display = 'none';
        }
        else{
            document.getElementById('hierarchies').style.opacity='1';
            document.getElementById('button-0').style.display = 'inline';
        }
    }

