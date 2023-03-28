<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../lawyers.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];

// checking is there is selected lawyer 
if (isset($_POST['item']) && $_POST['item'] != ".....") {
    // get selected Lawyer 
    $lawyerQuery = "SELECT * FROM `lawyers` WHERE `id`='{$_POST['item']}'";
    $lawyer = mysqli_fetch_array(mysqli_query($connect, "$lawyerQuery"));

?>

    <center><img src="../<?php echo $lawyer['picture'] ?>" width="100" alt=""><br><br>
        <b><?php echo $lawyer['names'] ?></b>
    </center>
    <hr>
    <table align="center" style="font-size: 16px;width: 9cm;">
        <input type="hidden" name="lawyerId" value="<?php echo $lawyer[0] ?>">
        <tr>
            <td><b>Email:</b></td>
            <td><?php echo $lawyer['email'] ?></td>
        </tr>
        <tr>
            <td><b>Phone: &nbsp;&nbsp;</b></td>
            <td><?php echo $lawyer['phone'] ?></td>
        </tr>
        <tr>
            <td><b> Province: &nbsp;&nbsp;</b></td>
            <td><?php echo $lawyer['province'] ?></td>
        </tr>
        <tr>
            <td><b>District: &nbsp;&nbsp;</b></td>
            <td><?php echo $lawyer['district'] ?></td>
        </tr>
        <tr>
            <td><b>Languages: &nbsp;&nbsp;</b></td>
            <td><?php echo $lawyer['langauges'] ?></td>
        </tr>


    </table>
<?php } ?>