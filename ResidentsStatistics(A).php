<?php
    // database details
    $host = "localhost";    
    $username = "root";
    $password = "";
    $dbname = "login";

    // Connect to the MySQL database
    $db = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "SELECT COUNT(*) FROM residents_table WHERE Gender = 'Male'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $numRows = $row['COUNT(*)'];

    $query1 = "SELECT COUNT(*) FROM residents_table WHERE Gender = 'Female'";
    $result1 = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $numRows1 = $row1['COUNT(*)'];

    $query2 = "SELECT COUNT(*) FROM residents_table WHERE Race = 'Chinese'";
    $result2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $numRows2 = $row2['COUNT(*)'];

    $query3 = "SELECT COUNT(*) FROM residents_table WHERE Race = 'Malay'";
    $result3 = mysqli_query($db, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $numRows3 = $row3['COUNT(*)'];

    $query4 = "SELECT COUNT(*) FROM residents_table WHERE Race = 'Indian'";
    $result4 = mysqli_query($db, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $numRows4 = $row4['COUNT(*)'];

    $query7 = "SELECT COUNT(*) FROM residents_table WHERE Religion = 'Christianity'";
    $result7 = mysqli_query($db, $query7);
    $row7 = mysqli_fetch_assoc($result7);
    $numRows7 = $row7['COUNT(*)'];

    $query8 = "SELECT COUNT(*) FROM residents_table WHERE Religion = 'Buddhism'";
    $result8 = mysqli_query($db, $query8);
    $row8 = mysqli_fetch_assoc($result8);
    $numRows8 = $row8['COUNT(*)'];

    $query9 = "SELECT COUNT(*) FROM residents_table WHERE Religion = 'Islam'";
    $result9 = mysqli_query($db, $query9);
    $row9 = mysqli_fetch_assoc($result9);
    $numRows9 = $row9['COUNT(*)'];

    $query10 = "SELECT COUNT(*) FROM residents_table WHERE Religion = 'Hindu'";
    $result10 = mysqli_query($db, $query10);
    $row10 = mysqli_fetch_assoc($result10);
    $numRows10 = $row10['COUNT(*)'];

    $query11 = "SELECT COUNT(*) FROM residents_table WHERE Unit LIKE '%A%';";
    $result11 = mysqli_query($db, $query11);
    $row11 = mysqli_fetch_assoc($result11);
    $numRows11 = $row11['COUNT(*)'];

    $query12 = "SELECT COUNT(*) FROM residents_table WHERE Unit LIKE '%B%';";
    $result12 = mysqli_query($db, $query12);
    $row12 = mysqli_fetch_assoc($result12);
    $numRows12= $row12['COUNT(*)'];

    $query13 = "SELECT COUNT(*) FROM residents_table WHERE Unit LIKE '%C%';";
    $result13 = mysqli_query($db, $query13);
    $row13 = mysqli_fetch_assoc($result13);
    $numRows13= $row13['COUNT(*)'];

    $query14 = "SELECT COUNT(*) FROM residents_table WHERE Balance_Amount < 50;";
    $result14 = mysqli_query($db, $query14);
    $row14 = mysqli_fetch_assoc($result14);
    $numRows14= $row14['COUNT(*)'];

    $query15 = "SELECT COUNT(*) FROM residents_table WHERE Balance_Amount >= 50 AND Balance_Amount <= 100;";
    $result15 = mysqli_query($db, $query15);
    $row15 = mysqli_fetch_assoc($result15);
    $numRows15= $row15['COUNT(*)'];

    $query16 = "SELECT COUNT(*) FROM residents_table WHERE Balance_Amount > 100;";
    $result16 = mysqli_query($db, $query16);
    $row16 = mysqli_fetch_assoc($result16);
    $numRows16= $row16['COUNT(*)'];

    $query19 = "SELECT COUNT(*) FROM residents_table WHERE Age > 18 AND Age < 60;";
    $result19 = mysqli_query($db, $query19);
    $row19 = mysqli_fetch_assoc($result19);
    $numRows19= $row19['COUNT(*)'];

    $query20 = "SELECT COUNT(*) FROM residents_table WHERE Age >= 60 AND Age <= 100;";
    $result20 = mysqli_query($db, $query20);
    $row20 = mysqli_fetch_assoc($result20);
    $numRows20= $row20['COUNT(*)'];
?>
<html>
<title>(A)ResidentS Demographic Statistics</title>
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
<head>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<style>
        #chart-container {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 10px;
        }

        #chart-container1 {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 10px;
        }

        #chart-container2 {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 10px;
            margin-top: -200px;
        }

        #chart-container3 {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 10px;
            margin-top: -150px;
        }

        #chart-container4 {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 10px;
            margin-top: -200px;
        }

        #chart-container5 {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 10px;
            margin-top: -200px;
        }
        
        body{
            background-color: #FFDAB9;
            margin: 0;
        }

        .arrow{
            height:80px;
            width: 80px;
            /* margin-left: 1%; */
            /* margin-top: 1%; */
            z-index: 2;
            transform: translate(30%,30%);
            position: fixed;
        }
    </style>
    <script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container',
                width: '480',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "TOTAL NUMBER OF RESIDENTS BY GENDER",
                        "captionFontColor": "000000",
                        "useDataPlotColorForLabels": "1",
                        "bgColor": "FFDAB9",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "plottooltext": "$label, $value Residents",
                        "theme": "fusion"
                    },
                    "data": [
                    {
                        "label": "Male",
                        "value": "<?php echo $numRows; ?>"
                    }, 
                    {
                        "label": "Female",
                        "value": "<?php echo $numRows1; ?>"
                    },
                    ]
                }
            }
            );
			chartObj.render();

            var chartObj = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container1',
                width: '480',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "TOTAL NUMBER OF RESIDENTS BY RACE",
                        "captionFontColor": "000000",
                        "useDataPlotColorForLabels": "1",
                        "bgColor": "FFDAB9",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "plottooltext": "$label, $value Residents",
                        "theme": "fusion"
                    },
                    "data": [
                    {
                        "label": "Chinese",
                        "value": "<?php echo $numRows2; ?>"
                    }, 
                    {
                        "label": "Malay",
                        "value": "<?php echo $numRows3; ?>"
                    },
                    {
                        "label": "Indian",
                        "value": "<?php echo $numRows4; ?>"
                    }
                    ]
                }
            }
            );
			chartObj.render();

            var chartObj = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container2',
                width: '480',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "TOTAL NUMBER OF RESIDENTS BY RELIGION",
                        "captionFontColor": "000000",
                        "useDataPlotColorForLabels": "1",
                        "bgColor": "FFDAB9",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "plottooltext": "$label, $value Residents",
                        "theme": "fusion"
                    },
                    "data": [
                    {
                        "label": "Christianity",
                        "value": "<?php echo $numRows7; ?>"
                    }, 
                    {
                        "label": "Buddhism",
                        "value": "<?php echo $numRows8; ?>"
                    },
                    {
                        "label": "Islam",
                        "value": "<?php echo $numRows9; ?>"
                    },
                    {
                        "label": "Hindu",
                        "value": "<?php echo $numRows10; ?>"
                    },
                    ]
                }
            }
            );
			chartObj.render();

            var chartObj = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container3',
                width: '480',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "TOTAL NUMBER OF RESIDENTS BY UNIT BLOCK",
                        "captionFontColor": "000000",
                        "useDataPlotColorForLabels": "1",
                        "bgColor": "FFDAB9",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "plottooltext": "$label, $value Residents",
                        "theme": "fusion"
                    },
                    "data": [
                    {
                        "label": "Block A",
                        "value": "<?php echo $numRows11; ?>"
                    }, 
                    {
                        "label": "Block B",
                        "value": "<?php echo $numRows12; ?>"
                    },
                    {
                        "label": "Block C",
                        "value": "<?php echo $numRows13; ?>"
                    },
                    ]
                }
            }
            );
			chartObj.render();

            var chartObj = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container4',
                width: '480',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "TOTAL NUMBER OF RESIDENTS BY ACCOUNT BALANCE AMOUNT",
                        "captionFontColor": "000000",
                        "useDataPlotColorForLabels": "1",
                        "bgColor": "FFDAB9",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "plottooltext": "$label, $value Residents",
                        "theme": "fusion"
                    },
                    "data": [
                    {
                        "label": "Less than 50",
                        "value": "<?php echo $numRows14; ?>"
                    }, 
                    {
                        "label": "In between<br>50 and 100",
                        "value": "<?php echo $numRows15; ?>"
                    },
                    {
                        "label": "More than 100",
                        "value": "<?php echo $numRows16; ?>"
                    },
                    ]
                }
            }
            );
			chartObj.render();

            var chartObj = new FusionCharts({
                type: 'pie3d',
                renderAt: 'chart-container5',
                width: '480',
                height: '500',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "TOTAL NUMBER OF RESIDENTS BY AGE",
                        "captionFontColor": "000000",
                        "useDataPlotColorForLabels": "1",
                        "bgColor": "FFDAB9",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "plottooltext": "$label, $value Residents",
                        "theme": "fusion"
                    },
                    "data": [
                    {
                        "label": "Adult",
                        "value": "<?php echo $numRows19; ?>"
                    },
                    {
                        "label": "Old Adult",
                        "value": "<?php echo $numRows20; ?>"
                    },
                    ]
                }
            }
            );
			chartObj.render();
		});
</script>
</head>
<body>
    <a href="ViewStatistics(A).html">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <div class="chart-container" id="chart-container">FusionCharts XT will load here!</div>
    <div class="chart-container1" id="chart-container1">FusionCharts XT will load here!</div>
    <div class="chart-container2" id="chart-container2">FusionCharts XT will load here!</div>
    <div class="chart-container3" id="chart-container3">FusionCharts XT will load here!</div>
    <div class="chart-container4" id="chart-container4">FusionCharts XT will load here!</div>
    <div class="chart-container5" id="chart-container5">FusionCharts XT will load here!</div>
</body>
</html>
