<style>
    details{
        margin-left:20px;
    }
    .child{
        margin-left:20px;
    }
    form.hidden{
        display:none;
    }

    #hierarchies{
        display:block;
        position:relative;
        border:1px #ccc solid;
    }
    #addition-form{
    display:none;
    height:100%;
    width:100%;
    }
    a{
        text-decoration:none;         
    }
    button{
    margin-left:20px;
    }

</style>
<script>
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
</script>
<a href="javascript:toggleForm('0')" id="button-0">+</a>
<form method="post" action="{{ route('add_position') }}" class="hidden" id="addition-form">
    @csrf
    <input type="text" name="label" value="" placeholder="New position" />
    <input type="hidden" name="reports_to" value="" />
    <input type="submit" value="Add" />
    <input type="button" value="Cancel" onclick="toggleForm(the_button_id)" />
</form>
<div id="hierarchies">
    @php
        $positions = \CarvingIT\Hierarchies\Models\Position::all();
        function makeTree($positions, $parent_id = null){
            foreach($positions as $p){
                if($p->reports_to == $parent_id){
                    echo "<article>";
                    if(count($p->reports) > 0){
                        echo "<details>";
                        echo "<summary>".$p->label.
                        ' <button title="Add reporting position" onclick="javascript:toggleForm(\''.$p->id.'\')" id="button-'.$p->id.'">+</button></p>'.
                        "</summary>"; 
                        makeTree($positions, $p->id);
                        echo "</details>";
                    }
                    else{
                        echo '<div class="child">'.$p->label.
                        ' <button title="Add reporting position" onclick="javascript:toggleForm(\''.$p->id.'\')" id="button-'.$p->id.'">+</button>
                        <form method="post" action="'.route('remove_position').'" style="display:inline-block;">
                        <input type="hidden" name="position_id" value="'.$p->id.'" />
                        <input type="hidden" name="_token" value="'. csrf_token(). '" />
                        <input type="submit" title="Remove this position" value="x" />
                        </form>
                        </div>';
                    }
                    echo "</article>";
                }
            } 
        }

        makeTree($positions);
    @endphp
</div>
