<style>
    details{
        margin-left:20px;
    }
    p.child{
        margin-left:20px;
    }
</style>
<section class="hierachies">
    @php
        $positions = \CarvingIT\Hierarchies\Models\Position::all();
        function makeTree($positions, $parent_id = null){
            foreach($positions as $p){
                if($p->reports_to == $parent_id){
                    echo "<article>";
                    if(count($p->reports) > 0){
                        echo "<details>";
                        echo "<summary>".$p->label."</summary>"; 
                        makeTree($positions, $p->id);
                        echo "</details>";
                    }
                    else{
                        echo '<p class="child">'.$p->label."</p>";
                    }
                    echo "</article>";
                }
            } 
        }

        makeTree($positions);
    @endphp
</section>
