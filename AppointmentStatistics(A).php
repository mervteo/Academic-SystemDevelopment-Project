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

    $query = "SELECT COUNT(*) FROM appointment";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $numRows = $row['COUNT(*)'];

    $query1 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A';";
    $result1 = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $numRows1 = $row1['COUNT(*)'];

    $query2 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B';";
    $result2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $numRows2= $row2['COUNT(*)'];

    $query3 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C';";
    $result3 = mysqli_query($db, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $numRows3= $row3['COUNT(*)'];

    $query4 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D';";
    $result4 = mysqli_query($db, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $numRows4= $row4['COUNT(*)'];



    $query5 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A' AND HOUR(Start_Time) BETWEEN '7' AND '12';";
    $result5 = mysqli_query($db, $query5);
    $row5 = mysqli_fetch_assoc($result5);
    $numRows5 = $row5['COUNT(*)'];

    $query6 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A' AND HOUR(Start_Time) BETWEEN '13' AND '17';";
    $result6 = mysqli_query($db, $query6);
    $row6 = mysqli_fetch_assoc($result6);
    $numRows6= $row6['COUNT(*)'];

    $query7 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A' AND HOUR(Start_Time) BETWEEN '18' AND '23';";
    $result7 = mysqli_query($db, $query7);
    $row7 = mysqli_fetch_assoc($result7);
    $numRows7= $row7['COUNT(*)'];

    $query8 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B' AND HOUR(Start_Time) BETWEEN '7' AND '12';";
    $result8 = mysqli_query($db, $query8);
    $row8 = mysqli_fetch_assoc($result8);
    $numRows8 = $row8['COUNT(*)'];

    $query9 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B' AND HOUR(Start_Time) BETWEEN '13' AND '17';";
    $result9 = mysqli_query($db, $query9);
    $row9 = mysqli_fetch_assoc($result9);
    $numRows9= $row9['COUNT(*)'];

    $query10 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B' AND HOUR(Start_Time) BETWEEN '18' AND '23';";
    $result10 = mysqli_query($db, $query10);
    $row10 = mysqli_fetch_assoc($result10);
    $numRows10= $row10['COUNT(*)'];

    $query11 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C' AND HOUR(Start_Time) BETWEEN '7' AND '12';";
    $result11 = mysqli_query($db, $query11);
    $row11 = mysqli_fetch_assoc($result11);
    $numRows11 = $row11['COUNT(*)'];

    $query12 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C' AND HOUR(Start_Time) BETWEEN '13' AND '17';";
    $result12 = mysqli_query($db, $query12);
    $row12 = mysqli_fetch_assoc($result12);
    $numRows12= $row12['COUNT(*)'];

    $query13 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C' AND HOUR(Start_Time) BETWEEN '18' AND '23';";
    $result13 = mysqli_query($db, $query13);
    $row13 = mysqli_fetch_assoc($result13);
    $numRows13= $row13['COUNT(*)'];

    $query14 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D' AND HOUR(Start_Time) BETWEEN '7' AND '12';";
    $result14 = mysqli_query($db, $query14);
    $row14 = mysqli_fetch_assoc($result14);
    $numRows14 = $row14['COUNT(*)'];

    $query15 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D' AND HOUR(Start_Time) BETWEEN '13' AND '17';";
    $result15 = mysqli_query($db, $query15);
    $row15 = mysqli_fetch_assoc($result15);
    $numRows15= $row15['COUNT(*)'];

    $query16 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D' AND HOUR(Start_Time) BETWEEN '18' AND '23';";
    $result16 = mysqli_query($db, $query16);
    $row16 = mysqli_fetch_assoc($result16);
    $numRows16= $row16['COUNT(*)'];



    $query17 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A' AND MONTH(Appointment_Date) = '08';";
    $result17 = mysqli_query($db, $query17);
    $row17 = mysqli_fetch_assoc($result17);
    $numRows17 = $row17['COUNT(*)'];

    $query18 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A' AND MONTH(Appointment_Date) = '09';";
    $result18 = mysqli_query($db, $query18);
    $row18 = mysqli_fetch_assoc($result18);
    $numRows18= $row18['COUNT(*)'];

    $query19 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'A' AND MONTH(Appointment_Date) = '10';";
    $result19 = mysqli_query($db, $query19);
    $row19 = mysqli_fetch_assoc($result19);
    $numRows19= $row19['COUNT(*)'];

    $query20 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B' AND MONTH(Appointment_Date) = '08';";
    $result20 = mysqli_query($db, $query20);
    $row20 = mysqli_fetch_assoc($result20);
    $numRows20 = $row20['COUNT(*)'];

    $query21 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B' AND MONTH(Appointment_Date) = '09';";
    $result21 = mysqli_query($db, $query21);
    $row21 = mysqli_fetch_assoc($result21);
    $numRows21= $row21['COUNT(*)'];

    $query22 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'B' AND MONTH(Appointment_Date) = '10';";
    $result22 = mysqli_query($db, $query22);
    $row22 = mysqli_fetch_assoc($result22);
    $numRows22= $row22['COUNT(*)'];

    $query23 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C' AND MONTH(Appointment_Date) = '08';";
    $result23 = mysqli_query($db, $query23);
    $row23 = mysqli_fetch_assoc($result23);
    $numRows23 = $row23['COUNT(*)'];

    $query24 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C' AND MONTH(Appointment_Date) = '09';";
    $result24 = mysqli_query($db, $query24);
    $row24 = mysqli_fetch_assoc($result24);
    $numRows24= $row24['COUNT(*)'];

    $query25 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'C' AND MONTH(Appointment_Date) = '10';";
    $result25 = mysqli_query($db, $query25);
    $row25 = mysqli_fetch_assoc($result25);
    $numRows25= $row25['COUNT(*)'];

    $query26 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D' AND MONTH(Appointment_Date) = '08';";
    $result26 = mysqli_query($db, $query26);
    $row26 = mysqli_fetch_assoc($result26);
    $numRows26 = $row26['COUNT(*)'];

    $query27 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D' AND MONTH(Appointment_Date) = '09';";
    $result27 = mysqli_query($db, $query27);
    $row27 = mysqli_fetch_assoc($result27);
    $numRows27= $row27['COUNT(*)'];

    $query28 = "SELECT COUNT(*) FROM appointment WHERE Plan_Type = 'D' AND MONTH(Appointment_Date) = '10';";
    $result28 = mysqli_query($db, $query28);
    $row28 = mysqli_fetch_assoc($result28);
    $numRows28= $row28['COUNT(*)'];
?>

<html>
<title>(A)Showroom Visiting Statistics</title>
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
            margin-left: 20px;
        }

        #chart-container1 {
            display: inline-block;
            justify-content: left;
            align-items: left;
            height: 100vh; /* Adjust this if needed */
            margin-left: 40px;
        }

        body{
            background-color: #FFDAB9;
        }

        .arrow{
            height:80px;
            width: 80px;
            /* margin-left: 1%; */
            /* margin-top: 1%; */
            z-index: 2;
            transform: translate(30%,60%);
            position: fixed;
        }
    </style>
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
                type: 'multilevelpie',
                renderAt: 'chart-container',
                width: '700',
                height: '700',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "showBorder": "1",
                        "borderColor": "000000",
                        "borderThickness": "3",
                        "caption": "SHOWROOM VISITING APPOINTMENTS BASED ON{br}TYPE PLAN AND SESSION",
                        "captionFontSize": "30",       
                        "captionFontColor": "000000",
                        "subCaptionFontSize": "18",  
                        "captionFontBold": "1",
                        "captionPadding": "20",
                        "showPlotBorder": "1",
                        "piefillalpha": "60",
                        "bgColor": "#FFDAB9 ",
                        "pieborderthickness": "2",
                        "hoverfillcolor": "#CCCCCC",
                        "piebordercolor": "#FFFFFF",
                        "hoverfillcolor": "#CCCCCC",
                        "plottooltext": "$value Requests, $percentValue",
                        "alignCaptionWithCanvas": "1",
                        "theme": "fusion",
                        "skipOverlapLabels": "1"
                    },
                    "category": [{
                        "label": "Appointments{br}Made",
                        "color": "#ffffff",
                        "value": "<?php echo $numRows; ?>",
                        "category": [
                            {
                                "label": "Type Plan A",
                                "color": "#f8bd19",
                                "value": "<?php echo $numRows1; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "Morning",
                                        "color": "#f8bd19",
                                        "value": "<?php echo $numRows5; ?>"
                                    }, 
                                    {
                                        "label": "Afternoon",
                                        "color": "#f8bd19",
                                        "value": "<?php echo $numRows6; ?>"
                                    },
                                    {
                                        "label": "Evening",
                                        "color": "#f8bd19",
                                        "value": "<?php echo $numRows7; ?>"
                                    }
                                ]
                            },
                            {
                                "label": "Type Plan B",
                                "color": "#33ccff",
                                "value": "<?php echo $numRows2; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "Morning",
                                        "color": "#33ccff",
                                        "value": "<?php echo $numRows8; ?>"
                                    }, 
                                    {
                                        "label": "Afternoon",
                                        "color": "#33ccff",
                                        "value": "<?php echo $numRows9; ?>"
                                    },
                                    {
                                        "label": "Evening",
                                        "color": "#33ccff",
                                        "value": "<?php echo $numRows10; ?>"
                                    }
                                ]
                            },
                            {
                                "label": "Type Plan C",
                                "color": "#ffcccc",
                                "value": "<?php echo $numRows3; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "Morning",
                                        "color": "#ffcccc",
                                        "value": "<?php echo $numRows11; ?>"
                                    }, 
                                    {
                                        "label": "Afternoon",
                                        "color": "#ffcccc",
                                        "value": "<?php echo $numRows12; ?>"
                                    },
                                    {
                                        "label": "Evening",
                                        "color": "#ffcccc",
                                        "value": "<?php echo $numRows13; ?>"
                                    }
                                ]
                            },
                            {
                                "label": "Type Plan D",
                                "color": "#66cc66",
                                "value": "<?php echo $numRows4; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "Morning",
                                        "color": "#66cc66",
                                        "value": "<?php echo $numRows14; ?>"
                                    }, 
                                    {
                                        "label": "Afternoon",
                                        "color": "#66cc66",
                                        "value": "<?php echo $numRows15; ?>"
                                    },
                                    {
                                        "label": "Evening",
                                        "color": "#66cc66",
                                        "value": "<?php echo $numRows16; ?>"
                                    }
                                ]
                            }
                        ]
                    }]
                }
            });
			chartObj.render();

            var chartObj = new FusionCharts({
                type: 'multilevelpie',
                renderAt: 'chart-container1',
                width: '700',
                height: '700',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "showBorder": "1",
                        "borderColor": "000000",
                        "borderThickness": "3",
                        "caption": "SHOWROOM VISITING APPOINTMENTS BASED ON{br}TYPE PLAN AND MONTH",
                        "captionFontSize": "30",       
                        "captionFontColor": "000000",
                        "subCaptionFontSize": "18",  
                        "captionFontBold": "1",
                        "captionPadding": "20",
                        "showPlotBorder": "1",
                        "piefillalpha": "60",
                        "bgColor": "#FFDAB9 ",
                        "pieborderthickness": "2",
                        "hoverfillcolor": "#CCCCCC",
                        "piebordercolor": "#FFFFFF",
                        "hoverfillcolor": "#CCCCCC",
                        "plottooltext": "$value Requests, $percentValue",
                        "alignCaptionWithCanvas": "1",
                        "theme": "fusion",
                        "skipOverlapLabels": "1"
                    },
                    "category": [{
                        "label": "Appointments{br}Made",
                        "color": "#ffffff",
                        "value": "<?php echo $numRows; ?>",
                        "category": [
                            {
                                "label": "Type Plan A",
                                "color": "#f8bd19",
                                "value": "<?php echo $numRows1; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "August",
                                        "color": "#f8bd19",
                                        "value": "<?php echo $numRows17; ?>"
                                    }, 
                                    {
                                        "label": "September",
                                        "color": "#f8bd19",
                                        "value": "<?php echo $numRows18; ?>"
                                    },
                                    {
                                        "label": "October",
                                        "color": "#f8bd19",
                                        "value": "<?php echo $numRows19; ?>"
                                    }
                                ]
                            },
                            {
                                "label": "Type Plan B",
                                "color": "#33ccff",
                                "value": "<?php echo $numRows2; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "August",
                                        "color": "#33ccff",
                                        "value": "<?php echo $numRows20; ?>"
                                    }, 
                                    {
                                        "label": "September",
                                        "color": "#33ccff",
                                        "value": "<?php echo $numRows21; ?>"
                                    },
                                    {
                                        "label": "October",
                                        "color": "#33ccff",
                                        "value": "<?php echo $numRows22; ?>"
                                    }
                                ]
                            },
                            {
                                "label": "Type Plan C",
                                "color": "#ffcccc",
                                "value": "<?php echo $numRows3; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "August",
                                        "color": "#ffcccc",
                                        "value": "<?php echo $numRows23; ?>"
                                    }, 
                                    {
                                        "label": "September",
                                        "color": "#ffcccc",
                                        "value": "<?php echo $numRows24; ?>"
                                    },
                                    {
                                        "label": "October",
                                        "color": "#ffcccc",
                                        "value": "<?php echo $numRows25; ?>"
                                    }
                                ]
                            },
                            {
                                "label": "Type Plan D",
                                "color": "#66cc66",
                                "value": "<?php echo $numRows4; ?>",
                                "tooltext": "$value Appointments, $percentValue",
                                "category": [
                                    {
                                        "label": "August",
                                        "color": "#66cc66",
                                        "value": "<?php echo $numRows26; ?>"
                                    }, 
                                    {
                                        "label": "September",
                                        "color": "#66cc66",
                                        "value": "<?php echo $numRows27; ?>"
                                    },
                                    {
                                        "label": "October",
                                        "color": "#66cc66",
                                        "value": "<?php echo $numRows28; ?>"
                                    }
                                ]
                            }
                        ]
                    }]
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
		<div id="chart-container"></div>
        <div id="chart-container1"></div>
	</body>
</html>
