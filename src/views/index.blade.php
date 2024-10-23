<link rel="stylesheet" href="/vendor/hierarchies/hierarchies.css" />
<script src="/vendor/hierarchies/hierarchies.js"></script>

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
