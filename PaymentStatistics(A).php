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

    $query = "SELECT COUNT(*) FROM payment WHERE Payment_Status = 'Successful'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $numRows = $row['COUNT(*)'];

    $query1 = "SELECT COUNT(*) FROM payment WHERE Payment_Status = 'Approved'";
    $result1 = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $numRows1 = $row1['COUNT(*)'];

    $query2 = "SELECT COUNT(*) FROM payment WHERE Payment_Status = 'Rejected'";
    $result2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $numRows2 = $row2['COUNT(*)'];

    $query3= "SELECT COUNT(*) FROM payment WHERE Payment_Status = 'Pending...'";
    $result3 = mysqli_query($db, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $numRows3 = $row3['COUNT(*)'];

    $query4 = "SELECT COUNT(*) FROM payment WHERE Payment_Status = 'Late'";
    $result4 = mysqli_query($db, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $numRows4 = $row4['COUNT(*)'];

    $query5 = "SELECT COUNT(*) FROM residents_table 
               WHERE residents_table.Resident_Id NOT IN (
                   SELECT DISTINCT payment.Resident_Id FROM payment)";
    $result5 = mysqli_query($db, $query5);
    $row5 = mysqli_fetch_assoc($result5);
    $numRows5 = $row5['COUNT(*)'];
?>
<html>
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
<title>(A)Residents Payment Statistics</title>
<head>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<style>
        #chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust this if needed */
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
            transform: translate(30%,20%);
            position: fixed;
        }
    </style>
    <script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
                type: 'bar3d',
                renderAt: 'chart-container',
                width: '1000',
                height: '700',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "theme": "fusion",
                        "showBorder": "1",
                        "borderColor": "000000",
                        "borderThickness": "3",
                        "caption": "TOTAL NUMBER OF RESIDENTS BY     PAYMENT STATUS",
                        "captionFontSize": "30",
                        "captionFontColor": "000000",
                        "yAxisName": "Total Number of Residents",
                        "xAxisName": "Payment Status",
                        "yAxisNameFontBold": "1",
                        "xAxisNameFontBold": "1",
                        "yAxisNameFontSize": "16",
                        "xAxisNameFontSize": "16",
                        "yAxisNameFontColor": "000000",
                        "xAxisNameFontColor": "000000",
                        "yAxisNameFontBold": "1",
                        "xAxisNameFontBold": "1",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "bgColor": "FFDAB9",
                        "plottooltext": "$label, $value Residents",
                        "alignCaptionWithCanvas": "1",
                    },

                    "data": [{
                            "label": "Successful",
                            "value": "<?php echo $numRows; ?>"
                        },
                        {
                            "label": "Approved",
                            "value": "<?php echo $numRows1; ?>"
                        },
                        {
                            "label": "Rejected",
                            "value": "<?php echo $numRows2; ?>"
                        },
                        {
                            "label": "Pending",
                            "value": "<?php echo $numRows3; ?>"
                        },
                        {
                            "label": "Late",
                            "value": "<?php echo $numRows4; ?>"
                        },
                        {
                            "label": "Unpaid",
                            "value": "<?php echo $numRows5; ?>"
                        }

                    ]
                }
            });
			chartObj.render();
		});
	</script>
	</head>
	<body>
        <a href="ViewStatistics(A).html">
            <img src="Arrow2.png" class="arrow" alt="">
        </a>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</body>
</html>
