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

    $query = "SELECT COUNT(*) FROM access_card";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $numRows = $row['COUNT(*)'];

    $query1 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%';";
    $result1 = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $numRows1 = $row1['COUNT(*)'];

    $query2 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%';";
    $result2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $numRows2= $row2['COUNT(*)'];

    $query3 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%';";
    $result3 = mysqli_query($db, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $numRows3= $row3['COUNT(*)'];



    $query4 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Approved';";
    $result4 = mysqli_query($db, $query4);
    $row4 = mysqli_fetch_assoc($result4);
    $numRows4= $row4['COUNT(*)'];

    $query5 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Rejected';";
    $result5 = mysqli_query($db, $query5);
    $row5 = mysqli_fetch_assoc($result5);
    $numRows5= $row5['COUNT(*)'];

    $query6 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Approved';";
    $result6 = mysqli_query($db, $query6);
    $row6 = mysqli_fetch_assoc($result6);
    $numRows6= $row6['COUNT(*)'];

    $query7 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Rejected';";
    $result7 = mysqli_query($db, $query7);
    $row7 = mysqli_fetch_assoc($result7);
    $numRows7= $row7['COUNT(*)'];

    $query8 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Approved';";
    $result8 = mysqli_query($db, $query8);
    $row8 = mysqli_fetch_assoc($result8);
    $numRows8= $row8['COUNT(*)'];

    $query9 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Rejected';";
    $result9 = mysqli_query($db, $query9);
    $row9 = mysqli_fetch_assoc($result9);
    $numRows9= $row9['COUNT(*)'];



    $query10 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Approved' AND Reasons = 'Lost';";
    $result10 = mysqli_query($db, $query10);
    $row10 = mysqli_fetch_assoc($result10);
    $numRows10= $row10['COUNT(*)'];

    $query11 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Approved' AND Reasons = 'Damage';";
    $result11 = mysqli_query($db, $query11);
    $row11 = mysqli_fetch_assoc($result11);
    $numRows11= $row11['COUNT(*)'];

    $query12 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Approved' AND Reasons = 'Stolen';";
    $result12 = mysqli_query($db, $query12);
    $row12 = mysqli_fetch_assoc($result12);
    $numRows12= $row12['COUNT(*)'];

    $query13 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Approved' AND Reasons = 'New Starter';";
    $result13 = mysqli_query($db, $query13);
    $row13 = mysqli_fetch_assoc($result13);
    $numRows13= $row13['COUNT(*)'];

    $query14 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Approved' AND Reasons = 'Malfunction';";
    $result14 = mysqli_query($db, $query14);
    $row14 = mysqli_fetch_assoc($result14);
    $numRows14= $row14['COUNT(*)'];



    $query15 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Rejected' AND Reasons = 'Lost';";
    $result15 = mysqli_query($db, $query15);
    $row15 = mysqli_fetch_assoc($result15);
    $numRows15= $row15['COUNT(*)'];

    $query16 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Rejected' AND Reasons = 'Damage';";
    $result16 = mysqli_query($db, $query16);
    $row16 = mysqli_fetch_assoc($result16);
    $numRows16= $row16['COUNT(*)'];

    $query17 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Rejected' AND Reasons = 'Stolen';";
    $result17 = mysqli_query($db, $query17);
    $row17 = mysqli_fetch_assoc($result17);
    $numRows17= $row17['COUNT(*)'];

    $query18 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Rejected' AND Reasons = 'New Starter';";
    $result18 = mysqli_query($db, $query18);
    $row18 = mysqli_fetch_assoc($result18);
    $numRows18= $row18['COUNT(*)'];

    $query19 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%A%' AND Status = 'Rejected' AND Reasons = 'Malfunction';";
    $result19 = mysqli_query($db, $query19);
    $row19 = mysqli_fetch_assoc($result19);
    $numRows19= $row19['COUNT(*)'];



    $query20 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Approved' AND Reasons = 'Lost';";
    $result20 = mysqli_query($db, $query20);
    $row20 = mysqli_fetch_assoc($result20);
    $numRows20= $row20['COUNT(*)'];

    $query21 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Approved' AND Reasons = 'Damage';";
    $result21 = mysqli_query($db, $query21);
    $row21 = mysqli_fetch_assoc($result21);
    $numRows21= $row21['COUNT(*)'];

    $query22 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Approved' AND Reasons = 'Stolen';";
    $result22 = mysqli_query($db, $query22);
    $row22 = mysqli_fetch_assoc($result22);
    $numRows22= $row22['COUNT(*)'];

    $query23 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Approved' AND Reasons = 'New Starter';";
    $result23 = mysqli_query($db, $query23);
    $row23 = mysqli_fetch_assoc($result23);
    $numRows23= $row23['COUNT(*)'];

    $query24 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Approved' AND Reasons = 'Malfunction';";
    $result24 = mysqli_query($db, $query24);
    $row24 = mysqli_fetch_assoc($result24);
    $numRows24= $row24['COUNT(*)'];



    $query25 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Rejected' AND Reasons = 'Lost';";
    $result25 = mysqli_query($db, $query25);
    $row25 = mysqli_fetch_assoc($result25);
    $numRows25= $row25['COUNT(*)'];

    $query26 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Rejected' AND Reasons = 'Damage';";
    $result26 = mysqli_query($db, $query26);
    $row26 = mysqli_fetch_assoc($result26);
    $numRows26= $row26['COUNT(*)'];

    $query27 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Rejected' AND Reasons = 'Stolen';";
    $result27 = mysqli_query($db, $query27);
    $row27 = mysqli_fetch_assoc($result27);
    $numRows27= $row27['COUNT(*)'];

    $query28 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Rejected' AND Reasons = 'New Starter';";
    $result28 = mysqli_query($db, $query28);
    $row28 = mysqli_fetch_assoc($result28);
    $numRows28= $row28['COUNT(*)'];

    $query29 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%B%' AND Status = 'Rejected' AND Reasons = 'Malfunction';";
    $result29 = mysqli_query($db, $query29);
    $row29 = mysqli_fetch_assoc($result29);
    $numRows29= $row29['COUNT(*)'];



    $query30 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Approved' AND Reasons = 'Lost';";
    $result30 = mysqli_query($db, $query30);
    $row30 = mysqli_fetch_assoc($result30);
    $numRows30= $row30['COUNT(*)'];

    $query31 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Approved' AND Reasons = 'Damage';";
    $result31 = mysqli_query($db, $query31);
    $row31 = mysqli_fetch_assoc($result31);
    $numRows31= $row31['COUNT(*)'];

    $query32 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Approved' AND Reasons = 'Stolen';";
    $result32 = mysqli_query($db, $query32);
    $row32 = mysqli_fetch_assoc($result32);
    $numRows32= $row32['COUNT(*)'];

    $query33 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Approved' AND Reasons = 'New Starter';";
    $result33 = mysqli_query($db, $query33);
    $row33 = mysqli_fetch_assoc($result33);
    $numRows33= $row33['COUNT(*)'];

    $query34 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Approved' AND Reasons = 'Malfunction';";
    $result34 = mysqli_query($db, $query34);
    $row34 = mysqli_fetch_assoc($result34);
    $numRows34= $row34['COUNT(*)'];

    

    $query35 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Rejected' AND Reasons = 'Lost';";
    $result35 = mysqli_query($db, $query35);
    $row35 = mysqli_fetch_assoc($result35);
    $numRows35= $row35['COUNT(*)'];

    $query36 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Rejected' AND Reasons = 'Damage';";
    $result36 = mysqli_query($db, $query36);
    $row36 = mysqli_fetch_assoc($result36);
    $numRows36= $row36['COUNT(*)'];

    $query37 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Rejected' AND Reasons = 'Stolen';";
    $result37 = mysqli_query($db, $query37);
    $row37 = mysqli_fetch_assoc($result37);
    $numRows37= $row37['COUNT(*)'];

    $query38 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Rejected' AND Reasons = 'New Starter';";
    $result38 = mysqli_query($db, $query38);
    $row38 = mysqli_fetch_assoc($result38);
    $numRows38= $row38['COUNT(*)'];

    $query39 = "SELECT COUNT(*) FROM access_card WHERE Unit LIKE '%C%' AND Status = 'Rejected' AND Reasons = 'Malfunction';";
    $result39 = mysqli_query($db, $query39);
    $row39 = mysqli_fetch_assoc($result39);
    $numRows39= $row39['COUNT(*)'];
?>

<html>
<title>(A)Access Card Requests Statistics</title>
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
        }

        .arrow{
            height:80px;
            width: 80px;
            /* margin-left: 1%; */
            /* margin-top: 1%; */
            z-index: 2;
            transform: translate(30%,2%);
            position: fixed;
        }
    </style>
    <a href="ViewStatistics(A).html">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
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
                        "caption": "RESIDENTS ACCESS CARD REQUESTS",
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
                        "label": "Access Card{br}Requests",
                        "color": "#ffffff",
                        "value": "<?php echo $numRows; ?>",

                        "category": [{
                            "label": "Block A",
                            "color": "#f8bd19",
                            "value": "<?php echo $numRows1; ?>",
                            "tooltext": "$value Reqeusts, $percentValue",
                            "category": [
                            {
                                "label": "Approved",
                                "color": "#f8bd19",
                                "value": "<?php echo $numRows4; ?>",
                                "category": [
                                {
                                    "label": "Lost",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows10; ?>"
                                }, {
                                    "label": "Damage",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows11; ?>"
                                }, {
                                    "label": "Stolen",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows12; ?>"
                                }, {
                                    "label": "New Starter",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows13; ?>"
                                }, {
                                    "label": "Malfunction",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows14; ?>"
                                }
                            ]
                            }, {
                                "label": "Rejected",
                                "color": "#f8bd19",
                                "value": "<?php echo $numRows5; ?>",
                                "category": [
                                {
                                    "label": "Lost",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows15; ?>"
                                }, {
                                    "label": "Damage",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows16; ?>"
                                }, {
                                    "label": "Stolen",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows17; ?>"
                                }, {
                                    "label": "New Starter",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows18; ?>"
                                }, {
                                    "label": "Malfunction",
                                    "color": "f8bd19",
                                    "value": "<?php echo $numRows19; ?>"
                                }
                            ]
                            }]


                        }, {
                            "label": "Block B",
                            "color": "#33ccff",
                            "value": "<?php echo $numRows2; ?>",
                            "tooltext": "$value Reqeusts, $percentValue",
                            "category": [
                            {
                                "label": "Approved",
                                "color": "#33ccff",
                                "value": "<?php echo $numRows6; ?>",
                                "category": [
                                {
                                    "label": "Lost",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows20; ?>"
                                }, {
                                    "label": "Damage",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows21; ?>"
                                }, {
                                    "label": "Stolen",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows22; ?>"
                                }, {
                                    "label": "New Starter",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows23; ?>"
                                }, {
                                    "label": "Malfunction",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows24; ?>"
                                }
                            ]
                            }, {
                                "label": "Rejected",
                                "color": "#33ccff",
                                "value": "<?php echo $numRows7; ?>",
                                "category": [
                                {
                                    "label": "Lost",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows25; ?>"
                                }, {
                                    "label": "Damage",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows26; ?>"
                                }, {
                                    "label": "Stolen",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows27; ?>"
                                }, {
                                    "label": "New Starter",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows28; ?>"
                                }, {
                                    "label": "Malfunction",
                                    "color": "33ccff",
                                    "value": "<?php echo $numRows29; ?>"
                                }
                            ]
                            }]


                        }, {
                            "label": "Block C",
                            "color": "#ffcccc",
                            "value": "<?php echo $numRows3; ?>",
                            "tooltext": "$value Reqeusts, $percentValue",
                            "category": [
                            {
                                "label": "Approved",
                                "color": "#ffcccc",
                                "value": "<?php echo $numRows8; ?>",
                                "category": [
                                {
                                    "label": "Lost",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows30; ?>"
                                }, {
                                    "label": "Damage",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows31; ?>"
                                }, {
                                    "label": "Stolen",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows32; ?>"
                                }, {
                                    "label": "New Starter",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows33; ?>"
                                }, {
                                    "label": "Malfunction",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows34; ?>"
                                }
                            ]
                            }, {
                                "label": "Rejected",
                                "color": "#ffcccc",
                                "value": "<?php echo $numRows9; ?>",
                                "category": [
                                {
                                    "label": "Lost",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows35; ?>"
                                }, {
                                    "label": "Damage",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows36; ?>"
                                }, {
                                    "label": "Stolen",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows37; ?>"
                                }, {
                                    "label": "New Starter",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows38; ?>"
                                }, {
                                    "label": "Malfunction",
                                    "color": "ffcccc",
                                    "value": "<?php echo $numRows39; ?>"
                                }
                            ]
                            }]
                        }]
                    }]
                }
            }
            );
			chartObj.render();
		});
	</script>
	</head>
	<body>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</body>
</html>
