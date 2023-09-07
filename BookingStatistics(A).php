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

    $query = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '08' AND Facilities_Type = 'Amphitheatre';";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $numRows = $row['COUNT(*)'];

    $query1 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '08' AND Facilities_Type = 'Gym Room';";
    $result1 = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $numRows1 = $row1['COUNT(*)'];

    $query2 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '08' AND Facilities_Type = 'Badminton Court';";
    $result2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $numRows2 = $row2['COUNT(*)'];

    $query3 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '08' AND Facilities_Type = 'Yoga Space';";
    $result3 = mysqli_query($db, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $numRows3 = $row3['COUNT(*)'];

    $query4 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '08' AND Facilities_Type = 'Swimming Pool';";
    $result4 = mysqli_query($db, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $numRows4 = $row4['COUNT(*)'];

    $query5 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '08' AND Facilities_Type = 'Karaoke';";
    $result5 = mysqli_query($db, $query5);
    $row5 = mysqli_fetch_assoc($result5);
    $numRows5 = $row5['COUNT(*)'];



    $query6 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '09' AND Facilities_Type = 'Amphitheatre';";
    $result6 = mysqli_query($db, $query6);
    $row6 = mysqli_fetch_assoc($result6);
    $numRows6 = $row6['COUNT(*)'];

    $query7 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '09' AND Facilities_Type = 'Gym Room';";
    $result7 = mysqli_query($db, $query7);
    $row7 = mysqli_fetch_assoc($result7);
    $numRows7 = $row7['COUNT(*)'];

    $query8 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '09' AND Facilities_Type = 'Badminton Court';";
    $result8 = mysqli_query($db, $query8);
    $row8 = mysqli_fetch_assoc($result8);
    $numRows8 = $row8['COUNT(*)'];

    $query9 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '09' AND Facilities_Type = 'Yoga Space';";
    $result9 = mysqli_query($db, $query9);
    $row9 = mysqli_fetch_assoc($result9);
    $numRows9 = $row9['COUNT(*)'];

    $query10 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '09' AND Facilities_Type = 'Swimming Pool';";
    $result10 = mysqli_query($db, $query10);
    $row10 = mysqli_fetch_assoc($result10);
    $numRows10 = $row10['COUNT(*)'];

    $query11 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '09' AND Facilities_Type = 'Karaoke';";
    $result11 = mysqli_query($db, $query11);
    $row11 = mysqli_fetch_assoc($result11);
    $numRows11 = $row11['COUNT(*)'];



    $query12 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '10' AND Facilities_Type = 'Amphitheatre';";
    $result12 = mysqli_query($db, $query12);
    $row12 = mysqli_fetch_assoc($result12);
    $numRows12 = $row12['COUNT(*)'];

    $query13 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '10' AND Facilities_Type = 'Gym Room';";
    $result13 = mysqli_query($db, $query13);
    $row13 = mysqli_fetch_assoc($result13);
    $numRows13 = $row13['COUNT(*)'];

    $query14 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '10' AND Facilities_Type = 'Badminton Court';";
    $result14 = mysqli_query($db, $query14);
    $row14 = mysqli_fetch_assoc($result14);
    $numRows14 = $row14['COUNT(*)'];

    $query15 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '10' AND Facilities_Type = 'Yoga Space';";
    $result15 = mysqli_query($db, $query15);
    $row15 = mysqli_fetch_assoc($result15);
    $numRows15 = $row15['COUNT(*)'];

    $query16 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '10' AND Facilities_Type = 'Swimming Pool';";
    $result16 = mysqli_query($db, $query16);
    $row16 = mysqli_fetch_assoc($result16);
    $numRows16 = $row16['COUNT(*)'];

    $query17 = "SELECT COUNT(*) FROM facility WHERE MONTH(Booking_Date) = '10' AND Facilities_Type = 'Karaoke';";
    $result17 = mysqli_query($db, $query17);
    $row17 = mysqli_fetch_assoc($result17);
    $numRows17 = $row17['COUNT(*)'];
?>  

<html>
<title>(A)Facility Bookings Statistics</title>
<link rel ='icon' href = 'Logo.jpeg' type="image/icon">
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
                type: 'logmscolumn2d',
                renderAt: 'chart-container',
                width: '1000',
                height: '700',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "theme": "fusion",
                        "showcanvasborder": "1",
                        "canvasBorderColor": "000000",
                        "showMinorDivLineValues": "1",
                        "caption": "FACILITIES BOOKINGS BY MONTH",
                        "captionFontSize": "30",
                        "captionFontColor": "000000",
                        "xAxisName": "Months",
                        "yAxisName": "Frequencies",
                        "yAxisNameFontBold": "1",
                        "xAxisNameFontBold": "1",
                        "yAxisNameFontSize": "16",
                        "xAxisNameFontSize": "16",
                        "yAxisNameFontColor": "000000",
                        "xAxisNameFontColor": "000000",
                        "legendItemFontBold": "1",
                        "legendItemFontColor": "000000",
                        "baseFontColor": "000000",
                        "bgColor": "FFDAB9",
                        "alignCaptionWithCanvas": "1",
                    },
                    "categories": [{
                        "category": [{
                            "label": "Amphitheatre",
                            "fontBold": "1"
                        }, {
                            "label": "Gym Room",
                            "fontBold": "1"
                        }, {
                            "label": "Badminton Court",
                            "fontBold": "1"
                        }, {
                            "label": "Yoga Space",
                            "fontBold": "1"
                        }, {
                            "label": "Swimming Pool",
                            "fontBold": "1"
                        }, {
                            "label": "Karaoke",
                            "fontBold": "1"
                        }]
                    }],
                    "dataset": [
                    {
                        "seriesname": "August",
                        "data": [{
                            "value": "<?php echo $numRows; ?>"
                        }, {
                            "value": "<?php echo $numRows1; ?>"
                        }, {
                            "value": "<?php echo $numRows2; ?>"
                        }, {
                            "value": "<?php echo $numRows3; ?>"
                        }, {
                            "value": "<?php echo $numRows4; ?>"
                        }, {
                            "value": "<?php echo $numRows5; ?>"
                        }]
                    }, 
                    {
                        "seriesname": "September",
                        "data": [{
                            "value": "<?php echo $numRows6; ?>"
                        }, {
                            "value": "<?php echo $numRows7; ?>"
                        }, {
                            "value": "<?php echo $numRows8; ?>"
                        }, {
                            "value": "<?php echo $numRows9; ?>"
                        }, {
                            "value": "<?php echo $numRows10; ?>"
                        }, {
                            "value": "<?php echo $numRows11; ?>"
                        }]
                    },
                    {
                        "seriesname": "October",
                        "data": [{
                            "value": "<?php echo $numRows12; ?>"
                        }, {
                            "value": "<?php echo $numRows13; ?>"
                        }, {
                            "value": "<?php echo $numRows14; ?>"
                        }, {
                            "value": "<?php echo $numRows15; ?>"
                        }, {
                            "value": "<?php echo $numRows16; ?>"
                        }, {
                            "value": "<?php echo $numRows17; ?>"
                        }]
                    }
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
		<div id="chart-container">FusionCharts XT will load here!</div>
	</body>
</html>
