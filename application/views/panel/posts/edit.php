<h3 style="text-decoration: underline; margin-bottom: 10px; display: inline;">Pełny tekst</h3>
<input class="ieaButton" style="display: inline; margin: 0px;" type="button" value="Zapisz" onclick="setFullText()" />
<br />
<textarea id="descFull" name="descFull" style="width: 500px;" rows="10">
<?php echo $post->desc; ?>
</textarea>
<br />

<hr style="margin: 10px 0px;" />

<h3 style="text-decoration: underline; margin-bottom: 10px; display: inline;">Skrócony tekst</h3>
<input class="ieaButton" style="margin: 0px; display: inline;" type="button" value="Zapisz" onclick="setShortText()" />
<br />
<textarea id="descShort" name="descShort" style="width: 500px;" rows="5">
<?php echo $post->short_desc; ?>
</textarea>
<br />

