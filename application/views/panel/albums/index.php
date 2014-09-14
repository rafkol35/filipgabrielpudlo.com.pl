<div style="margin: 0px auto; width: 500px;">

        <div id="divDesc" style="height: 90px;">Albumy:
            <input class="ieaButton" type="button" id="createAlbum" value="Dodaj album" />
            <br />
            Sortuj : <br />
            <input class="ieaButton" style="margin: 0px;" type="button" onclick="show_albums('date','asc')" value="Po dacie rosnąco" />
            <input class="ieaButton" style="margin: 0px;" type="button" onclick="show_albums('date','desc')" value="Po dacie malejąco" />
            <input class="ieaButton" style="margin: 0px;" type="button" onclick="show_albums('name','asc')" value="Po nazwie rosnąco" />
            <input class="ieaButton" style="margin: 0px;" type="button" onclick="show_albums('name','desc')" value="Po nazwie malejąco" />
            
        </div>

        <div id="albumsList" style="width: 500px">
        </div>
        <div id="viewControls" style="margin-top: 10px; text-align: center; width: 500px; clear:both">
            <div id="pagesNums" style="height: 20px; margin-bottom: 10px; background-color: #888; padding: 2px 0px; font-size: 15px; font-weight: bold;"></div>
            <input type="text" value="5" id="itemOnPage" name="itemOnPage" size="2" /> Na strone 
            <input class="ieaButton" type="button" id="setItemOnPage" value="Pokaż" />
        </div>

    </div>