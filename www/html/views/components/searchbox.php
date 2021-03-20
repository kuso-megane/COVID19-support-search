
<script>
    // for initAreaSelect() in asset/js/initAreaSelect.js
    const searchedAreaId = "<?php echo $searched_area_id;  ?>";
</script>

<form action="/search">
    <div id="search-box-container">
        <div id="search-box">
            <p class="block-start0">&lt;検索はこちら&gt;</p>

            <div class="search-items">
                <p><span class="bold">困っていること:</span></p>
                <select name="trouble_id" id="trouble">

                    <?php foreach($troubleNameList as $troubleName): ?>

                    <option value="<?php echo $troubleName['id']; ?>"
                        <?php if ($searched_trouble_id === $troubleName['id']) {echo 'selected';} ?> >
                        <?php echo $troubleName['name']; ?>
                    </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="search-items">
                <p><span class="bold">地域:</span></p>  
                <div>     
                    <select id="regionSelect" name="region_id" onchange="initAreaSelect()">
                        <option value="1" <?php if ($searched_region_id === 1) {echo 'selected';} ?>>北海道・東北</option>
                        <option value="2" <?php if ($searched_region_id === 2) {echo 'selected';} ?>>関東</option>
                        <option value="3" <?php if ($searched_region_id === 3) {echo 'selected';} ?> >中部</option>
                        <option value="4" <?php if ($searched_region_id === 4) {echo 'selected';} ?>>近畿</option>
                        <option value="5" <?php if ($searched_region_id === 5) {echo 'selected';} ?>>中国・四国</option>
                        <option value="6" <?php if ($searched_region_id === 6) {echo 'selected';} ?>>九州・沖縄</option>
                    </select>
                </div>  
            </div>

            <div class="search-items">
                <p><span class="bold">都道府県:</span></p>  
                <div>     
                    <select id="areaSelect" name="area_id">
                    </select>
                </div>
            </div>

            <p class="search-items">
                <span class="bold">
                    <input id="is_foreign_ok" type="checkbox" name="is_foreign_ok" value="on"
                        <?php if ($searched_is_foreign_ok === TRUE) {echo 'checked';} ?> >

                    <label for="foreign">
                        国籍不問
                    </label>
                </span>  
            </p>
            <p>
                <input id="submit" type="submit" value="検索する">
            </p>  
        </div> 
    </div>   
</form>

<script src="/asset/js/initAreaSelect.js"></script>
