<?php
if (isset($_POST["View_Result"])) {
?>
    <script type="text/javascript">
        window.location = "ResultPage.php";
    </script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online voting system</title>
</head>

<body>
    <center>
        <img src="./Assets/GCT_Logo.jpg" alt="Logo" width="100" height="140" style="margin-top: 10px">
        <h1 style="color:green">
            <font size="4"></font>GOVERNMENT COLLEGE OF TECHNOLOGY</font><br />COIMBATORE
        </h1>

        <h3 style="color:#f76707">GENERAL SECRETARY & JOINT SECRETARY ELECTIONS</h3>

    </center>



    <div class="card border" style="width: 30rem;margin:0 auto; margin-top:40px">
        <div class="card-body" style="border: 1px solid #868e96;border-radius:8px;padding:22px 18px;">
            <form id="frm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Candidate Name for GS</label>
                    <select name="canditates" class="form-control" id="exampleFormControlSelect1">
                        <option value="ABHIRAJ SINGH"> ABHIRAJ SINGH </option>
                        <option value="MEGAVANNAN"> MEGAVANNAN </option>
                        <option value="THOUFEEQ"> THOUFEEQ </option>
                        <option value="JANA"> JANA </option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Candidate Name for JS</label>
                    <select name="canditatesJS" class="form-control" id="exampleFormControlSelect1">
                        <option value="ARIVUMATHI"> ARIVUMATHI </option>
                        <option value="CATHLYN JEBA GOLDY"> CATHLYN JEBA GOLDY </option>
                        <option value="MADHUMITHA"> MADHUMITHA </option>
                        <option value="NIKITHA"> NIKITHA </option>
                        <option value="KAYALVIZHI"> KAYALVIZHI </option>

                    </select>
                </div>

                <?php
                require('dbConnect.php');
                $result = mysqli_query($conn, "SELECT count(*) as total from details");
                $data = mysqli_fetch_assoc($result);

                if ($data['total'] <= 14) {
                    echo '<button type="submit" name="save" value="submit" id="SaveDetails" data-toggle="modal" data-target="#successModal" class="btn btn-primary">Submit</button>';
                }
                ?>
            </form>

            <!-- Show Result -->
            <br>
            <?php
            require('dbConnect.php');
            $result = mysqli_query($conn, "SELECT count(*) as total from details");
            $data = mysqli_fetch_assoc($result);

            if ($data['total'] >= 12) {

                echo '
                <form action="" method="POST">
                <button id="ShowResult" type="submit" name="View_Result" value="Show Result" class="btn btn-success">Show Result</button>
              
                </form>';
            }

            ?>

        </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Successfully Voted</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thanks for your Vote.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>





</body>

</html>

<script>
    $(document).ready(function() {
        $("#frm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "voting.php",
                method: "post",
                data: $("form").serialize(),
                dataType: "text",
                success: function(strMessage) {

                    $("#frm")[0].reset();
                }
            });
        });
    });
</script>