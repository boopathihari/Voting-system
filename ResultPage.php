<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-sm" style="padding-right:50px;">
                <h3>Vote details for JS(Join Secretary)</h3>
                <!-- Table for JS -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.NO</th>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Number of Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('dbConnect.php');
                        $sl = 0;
                        $WinnerJS = "SELECT CandidateJS, COUNT(CandidateJS) as WinnerCandid FROM details 
        GROUP BY CandidateJS
        ORDER BY WinnerCandid DESC";

                        $winnerJS = mysqli_query($conn, $WinnerJS);

                        while ($row = $winnerJS->fetch_assoc()) {
                            $sl++;
                        ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $row['CandidateJS']; ?></td>
                                <td><?php echo $row['WinnerCandid']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm" style="padding-right:50px;">
                <h3>Vote details for GS(General Secretary)</h3>
                <!-- Table for GS -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.NO</th>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Number of Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('dbConnect.php');
                        $sl = 0;
                        $WinnerGS = "SELECT CandidateGS, COUNT(CandidateGS) as WinnerCandid FROM details 
              GROUP BY CandidateGS
              ORDER BY WinnerCandid DESC";

                        $WinnerGS = mysqli_query($conn, $WinnerGS);

                        while ($row = $WinnerGS->fetch_assoc()) {
                            $sl++;
                        ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $row['CandidateGS']; ?></td>
                                <td><?php echo $row['WinnerCandid']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>