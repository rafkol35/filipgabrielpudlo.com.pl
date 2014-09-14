<h4>Prześlij plik na serwer : </h4>
<br />

<form style="border: 1px solid black; width: 500px; margin: 0px auto;" id="form1" action="index.php" method="post" enctype="multipart/form-data">
			<div class="fieldset flash" id="fsUploadProgress">
			<span class="legend">Kolejka przesyłania</span>
			</div>
		<div id="divStatus">0 plików przesłanych</div>
			<div>
				<span id="spanButtonPlaceHolder"></span>
				<input id="btnCancel" type="button" value="Zatrzymaj przesyłanie" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
			</div>

	</form>

<hr style="clear: both; margin: 10px 0px;" />

<h4>Pliki na serwerze : </h4>
<br />
<div id="downloadableFilesList">
</div>

<hr style="clear: both; margin: 10px 0px;" />
