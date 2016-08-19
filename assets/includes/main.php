<div class="col-md-12" role="main">
	<!-- Main frame-->
	<div class="panel panel-default">
		<div class="panel-body" id="indexInfo">
			<h3 class="control-title">Encryption and decryption by cipher of caesar.</h3>
			
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-link btn-md" data-toggle="modal" data-target="#infoModal">Instructions </button> <br /> 
			<!-- Modal -->
			<div class="modal fade" id="infoModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Instructions</h4>
						</div>
						<div class="modal-body">
							<p> 1) Input in left field source text; <br/>
							2) Enter the desired shift in center field (0 - to auto-shifting); <br/>
							3) Click on one of buttons: </p>
							<ol type="a">
								<li><abbr title="For encryption source text.">"Encrypt"</abbr>;</li>
								<li><abbr title="For decryption source text.">"Decrypt"</abbr>.</li>
							</ol>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Hide</button>
						</div>
					</div>

				</div>
			</div>

			<!-- Form -->
			<form role="form">					

				<!-- Left -->
				<div class="col-xs-4 col-sm-5 col-md-5">
					<div class="form-group">
						<label for="sourceText">Source Text:</label>
						<textarea class="form-control" rows="15" id="sourceText"></textarea>
					</div>
				</div>

				<!-- Center -->
				<div class="col-xs-3 col-sm-2 col-md-2" id="centerFields">
					<div class="form-group">
						<label for="shift">Shift:</label>
						<input type="number" class="form-control" id="shift" value="0">
					</div>
					<div class="btn-group btn-group-md .btn-group-vertical btn-block">
						<button type="submit" class="btn btn-success btn-md btn-block" id="encrypt">Encrypt</button>
						<button type="submit" class="btn btn-danger btn-dm btn-block" id="descrypt">Decrypt</button>
						<button type="submit" class="btn btn-info btn-dm btn-block" id="moveto">Copy to source</button>
					</div>
				</div>

				<!-- Right -->
				<div class="col-xs-4 col-sm-5 col-md-5">
					<div class="form-group">
						<label for="resultText">Result Text:</label>
						<textarea class="form-control" rows="15" id="resultText" disabled></textarea>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>