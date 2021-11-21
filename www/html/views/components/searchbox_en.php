<?php
    //formのみ。なんらかのブロック要素がimport先で必要

    use myapp\config\ViewsConfig;
?>

<script>
    // for initAreaSelect() in asset/js/initAreaSelect.js
    const searchedAreaId = "<?php echo $searched_area_id;  ?>";
</script>


<form id="search-box" action="/searchResult/0/1/1">
    <p id="search-box--title" class="block-start0 block-end0 bold">&lt;let's search by clicking here&gt;</p>
    <div id="search-box--main">

        <div class="search-items">
            <p><span class="bold">Troubles:</span></p>
            <select name="trouble_id" id="trouble">

                <?php foreach($troubleNameList as $troubleName): ?>

                <option value="<?php echo $troubleName['id']; ?>"
                    <?php if ($searched_trouble_id === $troubleName['id']) {echo 'selected';} ?> >
                    <?php echo htmlspecialchars($troubleName['name'], ENT_QUOTES); ?>
                </option>

                <?php endforeach; ?>

            </select>
        </div>

        <div class="search-items">
            <p><span class="bold">area:</span></p>  
            <div>     
                <select id="regionSelect" name="region_id" onchange="initAreaSelect()">
                    <option value="0" <?php if (!$searched_region_id) {echo 'selected';} ?>>whole country</option>
                    <option value="1" <?php if ($searched_region_id === 1) {echo 'selected';} ?>>Hokkaidou・Tohoku</option>
                    <option value="2" <?php if ($searched_region_id === 2) {echo 'selected';} ?>>Knatou</option>
                    <option value="3" <?php if ($searched_region_id === 3) {echo 'selected';} ?> >Tyubu</option>
                    <option value="4" <?php if ($searched_region_id === 4) {echo 'selected';} ?>>Kinki</option>
                    <option value="5" <?php if ($searched_region_id === 5) {echo 'selected';} ?>>Tyugoku・Sikoku</option>
                    <option value="6" <?php if ($searched_region_id === 6) {echo 'selected';} ?>>Kyushu・Okinawa</option>
                </select>
            </div>  
        </div>

        <div class="search-items">
            <p><span class="bold">prefecture:</span></p>  
            <div>  
                <select id="areaSelect" name="area_id">
                <!--optionはinitArea.jsで作成-->
                </select>
            </div>
        </div>
    </div> 
    <p id="is_only_foreign_ok-container">
        <span class="bold">
            <input id="is_only_foreign_ok" type="checkbox" name="is_only_foreign_ok" value="on"
                <?php if ($searched_is_foreign_ok === TRUE) {echo 'checked';} ?> >

            <label for="is_only_foreign_ok" id="is_only_foreign_ok--label">
                search for supports which don't matter nationality
            </label>
        </span>
    </p>
    <p id="submit-button--container">
        <input id="submit-button" type="submit" value="この条件で検索" class="center bold">
        
    </p>   
</form>
