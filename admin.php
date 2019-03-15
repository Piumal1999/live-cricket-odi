<?php
//session_start();
//if (!isset($_SESSION['type']) && $_SESSION['type'] != 'admin') {
//    header('Location: login.php');
//    die();
//}
//?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>102nd Battle of Blues</title>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">



            <!-- Begin Page Content -->
            <div class="container container-fluid">

                <div class="row">

                    <span>Team</span>
                    <span class="form-group">
                        <label for="team">Team</label>
                        <select class="form-control" id="team">
                            <option>SACK</option>
                            <option>TCK</option>
                        </select>
                    </span>

                    <span>Description</span>
                    <input type="text" name="description" id="description" placeholder="Description"><br><br>

                    <span>Score</span>
                    <input type="text" name="score" id="score" placeholder="Score"><br><br>

                    <span>Wickets</span>
                    <input type="text" name="wickets" id="wickets" placeholder="Wickets"><br><br>

                    <span>Overs</span>
                    <input type="text" name="overs" id="overs" placeholder="Overs"><br><br>


                    <input id="btnSubmit" type="submit">

                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <span>Copyright &copy; St. Anthony's College Kandy</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="js/jquery-1.11.3.min.js"></script>
<script>

    $(function () {
        $('#btnSubmit').click(function () {
            let team = $('#team').val()
            let description = $('#description').val()
            let score = $('#score').val()
            let wickets = $('#wickets').val()
            let overs = $('#overs').val()
            $.ajax({
                type: 'post',
                url: 'api/index.php/update-score',
                dataType : 'json',
                data: 'team='+team+'&description='+description+'&score='+score+'&wickets='+wickets+'&overs='+overs,
                success: function (data) {
                    alert('data sent')
                    console.log(data)
                }
            })
        })
    })

</script>

</body>

</html>
