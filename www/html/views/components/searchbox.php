<!DOCTYPE html>
<form action="" method="">
    <div class="searching">
        <div class="support box">
            <p>困っていること</p>
            <select name="support1" id="support1">
                <option value="consulting">生活一般について相談</option>
                <option value="house">住居入居支援</option>
                <option value="foodbank">食料の無料提供</option>
                <option value="eating">炊き出し</option>
            </select>
        </div>
     
        <div class="area box">
            <p>地域</p>            
            <select name="area">
                <option value="">全国</option>
                <option value="">東京</option>
                <option value="">大阪</option>
                <option value="">名古屋</option>
            </select>
        
        </div>

        <div class="condition box">
            <p>気になる条件</p>
            <input id="foreign" type="checkbox" name="condition" value="foreign"><label for="foreign">国籍不問</label>
            <input id="public" type="checkbox" name="condition" value="public"><label for="public">公的支援のみ</label>
            <input id="private" type="checkbox" name="condition" value="private"><label for="private">民間支援のみ</label>
            
        </div>
        
    </div> 
    <div class="search box">   
            <input type="submit" value="検索する🔍">
    </div>
        
</form>
