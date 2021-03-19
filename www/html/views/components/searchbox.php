
<form action="/search">
    <div id="search-box-container">
        <div id="search-box">
            <p class="block-start0">&lt;検索はこちら&gt;</p>
            <div class="search-items">
                <p><span class="bold">困っていること:</span></p>
                <select name="trouble" id="trouble">

                    <?php foreach($troubleNameList as $troubleName): ?>

                    <option value="<?php echo $troubleName['id']; ?>"
                        <?php echo ($searched_trouble_id === $troubleName['id']) ? 'selected' : ''; ?> >
                        <?php echo $troubleName['name']; ?>
                    </option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div class="search-items">
                <p><span class="bold">地域:</span></p>  
                <div>
                    関東:      
                    <select name="area">
                        <option value="">全国</option>
                        <option value="">東京</option>
                        <option value="">大阪</option>
                        <option value="">名古屋</option>
                    </select>
                </div>
                <div>
                    東北,北海道:
                    <select name="area">
                        <option value="">北海道</option>
                        <option value="">青森</option>
                        <option value="">岩手</option>
                    </select>
                </div>
                
            </div>
            <p class="search-items">
                <span class="bold">
                    <input id="is_foreign_ok" type="checkbox" name="is_foreign_ok" value="on"
                        <?php echo ($searched_is_foreign_ok === TRUE) ? 'checked': ''; ?> >

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
