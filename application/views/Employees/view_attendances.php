<div class="container">
  <div class="row">
    <div class="col-md-6">
      <?php echo form_open('employees/view_attendances',array('class'=>'form-inline'));?>
        <div class="form-group">
          <?php
            $data = array(
                    'type'          => 'text',
                    'name'          => 'start_date',
                    'placeholder'   => 'Start Date',
                    'class'         => 'form-control datepicker'
            );
            echo form_input($data);
          ?>
        </div>
        <div class="form-group">
          <?php
            $data = array(
                    'type'          => 'text',
                    'name'          => 'end_date',
                    'placeholder'   => 'End Date',
                    'class'         => 'form-control datepicker'
            );
            echo form_input($data);
          ?>
        </div>
        <button type="submit" class="btn btn-default">Search Attendance</button>
      </form>
    </div>
    <div class="col-md-6">
      <div class="text-right">
        Attendance Date :
        <strong>
          <?php
            if (is_array($search_date)) {
              $search_date = implode(' to ',$search_date);
            }
            echo $search_date;
          ?>
        </strong>
      </div>
    </div>
  </div>
</div>
<br/>

<div class="table-responsive">
    <div id="chart-container">FusionCharts will render here</div>
</div>


<?php
$categories = json_encode($graph['category']);
$presents   = json_encode($graph['present']);
$absents    = json_encode($graph['absent']);
?>

<script type="text/javascript">
  var WIDTH       = window.innerWidth;
  var CATEGORIES  = <?php echo $categories ?>;
  var PRESENTS    = <?php echo $presents ?>;
  var ABSENTS     = <?php echo $absents ?>;

	FusionCharts.ready(function () {
		var revenueChart = new FusionCharts({
	    type: 'mscolumn2d',
	    renderAt: 'chart-container',
	    width: WIDTH,
	    height: '400',
	    dataFormat: 'json',
	    dataSource: {
	        "chart": {
	            "caption": "NanoSoft Employee Attendance Graph",
	            "xAxisname": "Attendance Date",
	            "yAxisName": "Employees",
	            "numberPrefix": "",
              "numbersuffix": '%',
	            "plotFillAlpha" : "80",

	            //Cosmetics
	            "paletteColors" : "#0075c2,#1aaf5d",
	            "baseFontColor" : "#333333",
	            "baseFont" : "Helvetica Neue,Arial",
	            "captionFontSize" : "14",
	            "subcaptionFontSize" : "14",
	            "subcaptionFontBold" : "0",
	            "showBorder" : "0",
	            "bgColor" : "#ffffff",
	            "showShadow" : "0",
	            "canvasBgColor" : "#ffffff",
	            "canvasBorderAlpha" : "0",
	            "divlineAlpha" : "100",
	            "divlineColor" : "#999999",
	            "divlineThickness" : "1",
	            "divLineIsDashed" : "1",
	            "divLineDashLen" : "1",
	            "divLineGapLen" : "1",
	            "usePlotGradientColor" : "0",
	            "showplotborder" : "0",
	            "valueFontColor" : "#ffffff",
	            "placeValuesInside" : "1",
	            "showHoverEffect" : "1",
	            "rotateValues" : "1",
	            "showXAxisLine" : "1",
	            "xAxisLineThickness" : "1",
	            "xAxisLineColor" : "#999999",
	            "showAlternateHGridColor" : "0",
	            "legendBgAlpha" : "0",
	            "legendBorderAlpha" : "0",
	            "legendShadow" : "0",
	            "legendItemFontSize" : "10",
	            "legendItemFontColor" : "#666666"
	        },
	        "categories": [
	            {
	                "category": CATEGORIES
	            }
	        ],
	        "dataset": [
	            {
	                "seriesname": "Presents",
	                "data": PRESENTS
	            },
	            {
	                "seriesname": "Absents",
	                "data": ABSENTS
	            }
	        ]
	    }
	});

	revenueChart.render();
	});
</script>

<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  });
</script>
