$(document).ready (function () {
	//google.charts

	// Load the Visualization API and the piechart package.
	google.charts.load('current', {'packages':['corechart']});
	  
	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var jsonData = $.ajax({
				url: "getData.php",
				type: "POST",
				data: ({resultText: $("#resultText").val()}),
				dataType: "json",
				async: false
			}).responseText;
		// Create our data table out of JSON data loaded from server.
		var data = new google.visualization.DataTable(jsonData);

		var options = {
			width: $("#indexInfo").attr("width"),
			height: 500,
			bar: {groupWidth: "95%"},
			legend: { position: "none" },
		};
		var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
		chart.draw(data, options);

	}

	function funcBeforeEncrypt () {
		$("#resultText").text ("Processing...");
	}

	function funcBeforeMoveTo () {
		$("#resultText").text ("");
	}

	function funcSuccessEncrypt (data) {
		$("#resultText").text (data);

		$("#answer").hide();
		$("#freqDiagram").show();
		drawChart();
	}

	function funcSuccessMoveTo (data) {
		$("#sourceText").val (data);

		$("#answer").hide();
		$("#freqDiagram").hide();
		drawChart();
	}

	$("#encrypt").bind("click", function () {
		$.ajax ({
			url: "encryption.php",
			type: "POST",
			data: ({sourceText: $("#sourceText").val(), shift: $("#shift").val()}),
			dataType: "html",
			beforeSend: funcBeforeEncrypt,
			success: funcSuccessEncrypt
		});
	});	

	$("#descrypt").bind("click", function () {
		$.ajax ({
			url: "descryption.php",
			type: "POST",
			data: ({sourceText: $("#sourceText").val(), shift: $("#shift").val()}),
			dataType: "json",
			success: function(data) {
				$("#resultText").text (data[0].result);
				drawChart();

				$("#sh1").html(data[0].shift);
				$("#pc1").html(data[0].percent + "%");
				$("#rs1").html(data[0].result);

				$("#sh2").html(data[1].shift);
				$("#pc2").html(data[1].percent + "%");
				$("#rs2").html(data[1].result);

				$("#sh3").html(data[2].shift);
				$("#pc3").html(data[2].percent + "%");
				$("#rs3").html(data[2].result);

				$("#sh4").html(data[3].shift);
				$("#pc4").html(data[3].percent + "%");
				$("#rs4").html(data[3].result);

				$("#sh5").html(data[4].shift);
				$("#pc5").html(data[4].percent + "%");
				$("#rs5").html(data[4].result);

				$("#answer").show();
				$("#freqDiagram").show();
				drawChart();
			}
		});
	});	

	$("#moveto").bind("click", function () {
		$.ajax ({
			url: "moveto.php",
			type: "POST",
			data: ({resultText: $("#resultText").val()}),
			dataType: "html",
			beforeSend: funcBeforeMoveTo,
			success: funcSuccessMoveTo
		});
	});

});//doc.ready

