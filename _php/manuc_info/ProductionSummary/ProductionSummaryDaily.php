<?php
 
 include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';

echo '
<br>
<table class="table-hover table-bordered nowrap example-table" style="background-color: white;overflow: auto; width: 80%; text-align: center;margin: 0 auto" id="example-table">
    <thead style=" color:black;font-size: 14px;">
      <tr>
        <th  style="text-align: center;border: 1px solid #ddd;">DATE</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ITEM NAME</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD PLAN</th>
        <th  style="text-align: center;border: 1px solid #ddd;">PROD RESULT</th>
        <th  style="text-align: center;border: 1px solid #ddd;">GAP</th>
        <th  style="text-align: center;border: 1px solid #ddd;">ACHIEVEMENT RATE</th>
      </tr>
    </thead>
    <tbody>';

    $strfrom = $_POST['sortfrom'];
    $strto = $_POST['sortto'];
    $search = $_POST['search'];
    $PlanType=$_POST['PlanType'];
    if(isset($_POST['sortfrom']))
    {

  
    
    if ($strto == "" && $strfrom == "") {
        #code... condition above is whenever both date range are null
        $sqlprodresult = "SELECT PRINT_QTY from mis_product WHERE ITEM_NAME = '$search' AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";
        $sqlprodplan = "SELECT PLAN_QTY from mis_prod_plan_dl WHERE ITEM_NAME = '$search' AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
        /* $sqlitem = "SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
        FROM mis_product 
        LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
        WHERE mis_product.ITEM_NAME = '$search' 
        GROUP BY `ITEM_NAME`, DATE_"; 
        ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType'))
        */

/* 
        $sqlitem="SELECT * FROM (SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME,
         mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
        FROM mis_product
        LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
        WHERE mis_product.ITEM_NAME = '$search' AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
        GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_) as A
        UNION ALL
        SELECT * FROM (
        SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
        FROM mis_prod_plan_dl
        WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (ITEM_NAME = '$search')
        AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')) as B
        ORDER BY `DISP_DATE_` ASC";
 */
$sqlitem="SELECT COALESCE(SUM(mis_product.PRINT_QTY),0) as sumresult,mis_prod_plan_dl.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.DATE_ as DISP_DATE_ 
            FROM mis_prod_plan_dl 
            LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
            WHERE ((mis_prod_plan_dl.ITEM_NAME = '$search') OR (mis_product.ITEM_NAME = '$search')) AND 
            ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType')) 
             GROUP BY JOB_ORDER_NO
            ORDER BY DISP_DATE_ ASC";

        $between = "NO";
        $currentdate = date("Y-m-d", strtotime("2018-05-01"));
        $datenow = "";
    } elseif ($strto == "" && $strfrom != "") {
        # code... condition above is whenver from is set

        if ($search != "") {
            # code... if from and search is set
            $sqlprodresult = "SELECT PRINT_QTY from mis_product WHERE ITEM_NAME = '$search' AND DATE_ = '$strfrom' AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";
            $sqlprodplan = "SELECT PLAN_QTY from mis_prod_plan_dl WHERE ITEM_NAME = '$search' AND DATE_ = '$strfrom' AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
            /* $sqlitem = "SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
            FROM mis_product LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE mis_product.ITEM_NAME = '$search' AND mis_product.DATE_='$strfrom' 
            GROUP BY `ITEM_NAME`"; */

            $sqlitem="SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
            FROM mis_product
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE mis_product.ITEM_NAME = '$search' AND mis_product.DATE_='$strfrom' AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
            GROUP BY mis_product.`ITEM_NAME`
            UNION ALL
            SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
            FROM mis_prod_plan_dl
            WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (ITEM_NAME = '$search') 
            AND (DATE_='$strfrom')  AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')
            ORDER BY `PLAN_QTY` ASC";

            $datenow = $strfrom;
            $between = "NO";
            $currentdate = date("Y-m-d", strtotime($strfrom));

        } else {
            #if date from only is set

            $sqlprodresult = "SELECT PRINT_QTY from mis_product WHERE DATE_ = '$strfrom' AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";
            $sqlprodplan = "SELECT PLAN_QTY from mis_prod_plan_dl WHERE DATE_ = '$strfrom' AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
          /*   $sqlitem = "SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_
                         FROM mis_product
                         LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                         WHERE mis_product.DATE_='$strfrom' or mis_prod_plan_dl.DATE_='$strfrom'
                         GROUP BY `ITEM_NAME`"; */

/*             $sqlitem="SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME, 
                        mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
                        FROM mis_product
                        LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                        WHERE mis_product.DATE_='$strfrom' AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
                        GROUP BY mis_product.`ITEM_NAME`
                        UNION ALL
                        SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
                        FROM mis_prod_plan_dl
                        WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND DATE_ = '$strfrom' 
                        AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')
                        ORDER BY `PLAN_QTY` ASC"; */


                        $sqlitem="SELECT COALESCE(sum(mis_product.PRINT_QTY),0) as sumresult,mis_prod_plan_dl.ITEM_NAME, 
                        mis_prod_plan_dl.PLAN_QTY, mis_prod_plan_dl.DATE_ as DISP_DATE_ 
                        FROM mis_prod_plan_dl 
                        LEFT JOIN mis_product ON mis_prod_plan_dl.JOB_ORDER_NO = mis_product.JO_NUM 
                        WHERE
                        ((mis_prod_plan_dl.DATE_='$strfrom') OR (mis_product.DATE_='$strfrom')) AND
                        ((SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType') OR (SUBSTRING(mis_prod_plan_dl.JOB_ORDER_NO,1,1)='$PlanType')) 
                        GROUP BY DISP_DATE_, ITEM_NAME 
                        ORDER BY `ITEM_NAME` ASC";

         

            $sqltotalgraph = "SELECT mis_product.PRINT_QTY, mis_prod_plan_dl.PLAN_QTY from mis_product
                              LEFT JOIN mis_prod_plan_dl on mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO
                              WHERE mis_product.DATE_ = '$strfrom'";
            $currentdate = date("Y-m-d", strtotime($strfrom));
            $datenow = $strfrom;
            $between = "YES";

        }

    } else {
        #if both date range are NOT null
        if ($search != "") {
            # code... whenever date range are NOT null and Search is NOT null
            $sqlprodresult = "SELECT PRINT_QTY from mis_product WHERE (DATE_ BETWEEN '$strfrom' AND '$strto') 
            AND (ITEM_NAME = '$search') AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";
            $sqlprodplan = "SELECT PLAN_QTY from mis_prod_plan_dl WHERE (DATE_ BETWEEN '$strfrom' AND '$strto') 
            AND (ITEM_NAME = '$search') AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
            /* $sqlitem = "SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
            FROM mis_product 
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') AND (mis_product.ITEM_NAME = '$search') 
            GROUP BY `ITEM_NAME`,DATE_  ORDER BY DATE_ ASC"; */
            
            $sqlitem="SELECT * FROM 
            (SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
            FROM mis_product
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE (mis_product.DATE_ BETWEEN '$strfrom' AND '$strto') AND (mis_product.ITEM_NAME = '$search')
            AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
            GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_
            ) as A
            UNION ALL
            SELECT * FROM (
            SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
            FROM mis_prod_plan_dl
            WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (DATE_ BETWEEN '$strfrom' AND '$strto') 
            AND (ITEM_NAME = '$search') AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType') ) as B
            ORDER BY DISP_DATE_ ASC";

            $datenow = $strfrom . " to " . $strto;
            $between = "YES-SEARCH";
            $currentdate = date("Y-m-d", strtotime($strfrom));

        } else {
            #if both date range are not null while search is NULL
            $sqlprodresult = "SELECT PRINT_QTY from mis_product WHERE DATE_ BETWEEN '$strfrom' AND '$strto'
             AND (SUBSTRING(JO_NUM,1,1)='$PlanType')";
            $sqlprodplan = "SELECT PLAN_QTY from mis_prod_plan_dl WHERE DATE_ BETWEEN '$strfrom' AND '$strto'
            AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
            /* $sqlitem = "SELECT SUM(mis_product.PRINT_QTY)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ 
            FROM mis_product 
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE mis_product.DATE_ BETWEEN '$strfrom' AND '$strto' GROUP BY `ITEM_NAME`, DATE_ ORDER BY DATE_ ASC"; */

            $sqlitem="SELECT * FROM (SELECT  SUM(mis_product.PRINT_QTY)as sumresult,mis_product.ITEM_NAME, 
            mis_prod_plan_dl.PLAN_QTY,mis_product.DATE_ as DISP_DATE_
            FROM mis_product
            LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
            WHERE mis_product.DATE_ BETWEEN '$strfrom' AND '$strto' AND (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
            GROUP BY mis_product.`ITEM_NAME`, DISP_DATE_) as A
            UNION ALL
            SELECT * FROM (
            SELECT PROD_RESULT,ITEM_NAME,PLAN_QTY,DATE_
            FROM mis_prod_plan_dl
            WHERE JOB_ORDER_NO NOT IN (SELECT JO_NUM FROM mis_product) AND (DATE_ BETWEEN '$strfrom' AND '$strto')
            AND (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType') ) as B
            ORDER BY `DISP_DATE_` ASC";

            $datenow = $strfrom . " to " . $strto;
            $between = "YES";
            $currentdate = date("Y-m-d", strtotime($strfrom));

        }

    }

} else {

    #if date range and search is null

    $sqlprodresult = "SELECT PRINT_QTY from mis_product WHERE (SUBSTRING(JO_NUM,1,1)='$PlanType')";
    $sqlprodplan = "SELECT PLAN_QTY from mis_prod_plan_dl WHERE (SUBSTRING(JOB_ORDER_NO,1,1)='$PlanType')";
    $sqlitem = "SELECT SUM(`mis_product.PRINT_QTY`)as sumresult, mis_product.ITEM_NAME, mis_prod_plan_dl.PLAN_QTY
                LEFT JOIN mis_prod_plan_dl ON mis_product.JO_NUM = mis_prod_plan_dl.JOB_ORDER_NO 
                FROM mis_product 
                WHERE (SUBSTRING(mis_product.JO_NUM,1,1)='$PlanType')
                GROUP BY `ITEM_NAME` ";

                

    $datenow = "NONE";
    $between = "NO";

}

$conn2 = mysqli_connect("localhost", "root", "", "masterdatabase");

$result = $conn->query($sqlprodresult);
$result2 = $conn->query($sqlprodplan);

$prodresult1 = 0;
while ($row2 = $result->fetch_assoc()) {
    $prodresult1 = $prodresult1 + $row2['PRINT_QTY'];
}
$prodplan1 = 0;
while ($row2 = $result2->fetch_assoc()) {
    $prodplan1 = $prodplan1 + $row2['PLAN_QTY'];
}

if ($prodplan1 < $prodresult1) {
    # code...
    $gap = "+";
    $gap .= $prodresult1 - $prodplan1;

} else {
    $gap = "-";

    $gap .= $prodplan1 - $prodresult1;

}

if ($prodplan1 > 0) {

    $achieveresult = (($prodresult1 / $prodplan1) * 100);

    $achievepercent = round($achieveresult, 2);
    # code...

} else {
    $achievepercent = 0;

}

if ($datenow == "NONE") {
    # code...
    echo "<tr>";
    echo "<td style='border: 1px solid #ddd; height: 100px; font-size: 2em' colspan='6'>'PLEASE SELECT A DATE OR AN ITEM TO DISPLAY'</td>";
    echo "</tr>";
} else {

    echo "<tr style='font-size: 2em'>";
    echo "<td style='border: 1px solid #ddd; height: 100px;' colspan='2'> <b>TOTAL SUMMARY FROM " . $datenow . "</b></td>";
    #echo "<td style='border: 1px solid #ddd;'>-</td>";
    echo "<td style='border: 1px solid #ddd;'><b>" . $prodplan1 . "</b></td>";
    echo "<td style='border: 1px solid #ddd;'><b>" . $prodresult1 . "<b></td>";
    echo "<td style='border: 1px solid #ddd;'><b>" . $gap . "<b></td>";
    echo "<td style='border: 1px solid #ddd;'><b>" . $achievepercent . "% <b></td>";
    echo "</tr>";

    $result3 = $conn->query($sqlitem);

    while ($row3 = $result3->fetch_assoc()) {

        if ($row3['PLAN_QTY'] < $row3['sumresult']) {
            # code...
            $gap = "+";
            $gap .= $row3['sumresult'] - $row3['PLAN_QTY'];

        } elseif ($row3['PLAN_QTY'] == $row3['sumresult']) {
            # code...
            $gap = "";
            $gap .= $row3['PLAN_QTY'] - $row3['sumresult'];

        } else {
            $gap = "-";
            $gap .= $row3['PLAN_QTY'] - $row3['sumresult'];

        }

        if ($row3['PLAN_QTY'] > 0) {
            $achieveresult = (($row3['sumresult'] / $row3['PLAN_QTY']) * 100);

            $achievepercent = round($achieveresult, 2);
            # code...

        } else {
            $achievepercent = 0;
        }

        if ($between == "YES") 
        {
            # code...

            $sqlresultbetween = "SELECT SUM(PRINT_QTY) as prodresult2 FROM mis_product WHERE DATE_ ='" . $row3['DISP_DATE_'] . "' ";
            
            $sqlplanbetween = "SELECT SUM(PLAN_QTY) as planqty2 FROM mis_prod_plan_dl WHERE DATE_='" . $row3['DISP_DATE_'] . "'";

            $resultbet = $conn->query($sqlresultbetween);
            
            $planbet = $conn2->query($sqlplanbetween);

            while ($row = $resultbet->fetch_assoc()) {
                # code...
                

                while ($row2 = $planbet->fetch_assoc()) 
                {
                    # code...

                    if ($row3['DISP_DATE_'] >= $currentdate)
                    {

                        $currentdate = $row3['DISP_DATE_'];

                        if (isset($prevdate)) {
                            # code...
                            if ($prevdate == $currentdate) {
                                # code... do nothing
                            } else {
                                
                                $prevdate = $currentdate;
                                displaysummary($row2['planqty2'], $row['prodresult2'], $row3['DISP_DATE_']);
                            }

                        } else {
                            $prevdate = $currentdate;

                            displaysummary($row2['planqty2'], $row['prodresult2'], $row3['DISP_DATE_']);

                        }
                        # code...

                    } 
                   

                }
                #end of while

            }

        } 
        elseif ($between == "YES-SEARCH")
        {
            # code...

            $sqlresultbetween = "SELECT SUM(PRINT_QTY) as prodresult2, DATE_ FROM mis_product WHERE ITEM_NAME='" . $row3['ITEM_NAME'] . "' AND DATE_ ='" . $row3['DISP_DATE_'] . "' ";

            $resultbet = $conn->query($sqlresultbetween);
            while ($row = $resultbet->fetch_assoc()) {
                # code...

                $sqlplanbetween = "SELECT SUM(PLAN_QTY) as planqty2 FROM mis_prod_plan_dl WHERE ITEM_NAME='" . $row3['ITEM_NAME'] . "' AND DATE_='" . $row3['DISP_DATE_'] . "'";

                $planbet = $conn2->query($sqlplanbetween);

                while ($row2 = $planbet->fetch_assoc()) {
                    # code...

                    if ($row3['DISP_DATE_'] >= $currentdate) {

                        $currentdate = $row3['DISP_DATE_'];

                        if (isset($prevdate)) {
                            # code...
                            if ($prevdate == $currentdate) {
                                # code... do nothing
                            } else {
                                $prevdate = $currentdate;
                                displaysummary($row2['planqty2'], $row['prodresult2'], $row3['DISP_DATE_']);
                            }

                        } else {
                            $prevdate = $currentdate;

                            displaysummary($row2['planqty2'], $row['prodresult2'], $row3['DISP_DATE_']);

                        }
                        # code...

                    } else {
                        #echo $currentdate;
                        #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
                        #$currentdate=$hold;

                    }

                }
                #end of while

            }

        }
        else
        {
#start of else braces
$sqlresultbetween = "SELECT COALESCE(SUM(PRINT_QTY),0) as prodresult2, DATE_ FROM mis_product WHERE ITEM_NAME='" . $row3['ITEM_NAME']."' AND DATE_ ='" . $row3['DISP_DATE_'] . "' ";

$resultbet = $conn->query($sqlresultbetween);
while ($row = $resultbet->fetch_assoc()) {
    # code...

    $sqlplanbetween = "SELECT SUM(PLAN_QTY) as planqty2 FROM mis_prod_plan_dl WHERE ITEM_NAME='" . $row3['ITEM_NAME']."' AND DATE_ ='" . $row3['DISP_DATE_'] . "' ";

    $planbet = $conn2->query($sqlplanbetween);

    while ($row2 = $planbet->fetch_assoc()) {
        # code...

        if ($row3['DISP_DATE_'] >= $currentdate) {

            $currentdate = $row3['DISP_DATE_'];

            if (isset($prevdate)) {
                # code...
                if ($prevdate == $currentdate) {
                    # code... do nothing
                } else {
                    $prevdate = $currentdate;
                    displaysummary($row2['planqty2'], $row['prodresult2'], $row3['DISP_DATE_']);
                }

            } else {
                $prevdate = $currentdate;

                displaysummary($row2['planqty2'], $row['prodresult2'], $row3['DISP_DATE_']);

            }
            # code...

        } else {
            #echo $currentdate;
            #$hold=date('Y-m-d', strtotime($currentdate.'+1 day'));
            #$currentdate=$hold;

        }

    }
    #end of while

}

#end of else braces
        }

        echo "<tr style='font-size:1.2em'>";
        echo "<td style='border: 1px solid #ddd;'>" . $row3['DISP_DATE_'] . "</td>";
        echo "<td style='border: 1px solid #ddd;'>" . $row3['ITEM_NAME'] . "</td>";
        echo "<td style='border: 1px solid #ddd;'>" . $row3['PLAN_QTY'] . "</td>";
        echo "<td style='border: 1px solid #ddd;'>" . $row3['sumresult'] . "</td>";
        echo "<td style='border: 1px solid #ddd;'>" . $gap . "</td>";
        echo "<td style='border: 1px solid #ddd;'>" . $achievepercent . "% </td>";
        echo "</tr>";

    }

}

function displaysummary($funcPlan, $funcResult, $funcDate)
{

    if ($funcPlan < $funcResult) {

        $gapperday = "+";
        $gapperday .= $funcResult - $funcPlan;

    } elseif ($funcPlan == $funcResult) {
        # code...
        $gapperday = "";
        $gapperday .= $funcPlan - $funcResult;
    } else {
        $gapperday = "-";
        $gapperday .= $funcPlan - $funcResult;

    }

    if ($funcPlan > 0) {
        $achieveresultperday = (($funcResult / $funcPlan) * 100);

        $achievepercentperday = round($achieveresultperday, 2);
        # code...

    } else {
        $achievepercentperday = 0;
    }

    echo "<tr style='font-size:1.2em'>";
    echo "<td colspan='2'> <b>Total Prod Plan Vs Result of : " . $funcDate . "</b></td>";

    echo "<td><b>" . $funcPlan . "</b></td>";
    echo "<td><b>" . $funcResult . "</b></td>";
    echo "<td><b>" . $gapperday . "</b></td>";
    echo "<td><b>" . $achievepercentperday . "% </b></td>";
    echo "</tr>";

}


echo '</tbody></table><br><br>';

echo '<script>
$("#example-table").tabulator({});
</script>
';
