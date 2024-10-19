<?php
include('includes/header.php');
?>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                 
                 <?php 
                    $perPage = 6; // Número de registros por página
                    if (isset($_GET['pagina'])) {
                        if ($_GET['pagina'] == 1) {
                            header("Location: index.php");
                        } else {
                            $page = $_GET['pagina'];
                        }
                    } else {
                        $page = 1; // Primera página
                    }
                    $next = $page + 1;
                    $previous = $page - 1;

                    $offSet = ($page - 1) * $perPage;
            
                    $sql = "SELECT * FROM post ORDER BY post ASC";
                    $resultado = $base->prepare($sql);
                    $resultado->execute();
                    $register = $resultado->rowCount();

                    $total_pages = ceil($register / $perPage);
                    if($register > 0){

                        $sql = "SELECT * FROM post LIMIT $offSet, $perPage";
                        $resultado = $base->prepare($sql);
                        $resultado->execute();
                    ?>

                    <?php foreach($resultado as $datos): ?>

                        <h2 class="fw-bolder mb-1 mt-5"><?php echo $datos['title']; ?></h2>
                   
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4">
                    <img class="img-fluid rounded" src="assets/img/<?php echo $datos['img_url']; ?>" />
                </figure>

                <!-- Post meta content-->
                <div class="text-muted fst-italic mb-3" style="font-size: 1.2rem;">
                    Posted by <?php echo $datos['users']; ?> on <?php echo $datos['date_time']; ?>
                </div>

                <!-- Post categories-->
                <a class="badge bg-secondary text-decoration-none link-light mb-3"
                   href="includes/category.php?id=<?php echo $datos['category']; ?>"
                   style="font-size: 1rem; padding: 0.65rem 1rem;"><?php echo $datos['category']; ?></a>

                <!-- Post content-->
                <section class="mb-5">
                    <?php echo shortText($datos['post']); ?><br><br>

                    <a class="btn bg-secondary text-decoration-none link-light mb-2"
                       href="includes/post.php?id=<?php echo $datos['id']; ?>">
                        <?php echo $read_more; ?>
                    </a>

                </section>
                <?php endforeach; ?>
            </article>
            <!-- Pagination -->
            <div class="page">
                <?php
                if ($register >= 6) {
                    $pasos = $next + 1;
                    if ($page == $total_pages) {
                        $pasos = $previous + 1;
                    } else {
                        $pasos -= 1;
                    }
                }
                ?>

                <?php 
                    // FLECHA ANTERIOR
                    if ($page > 1) {
                        echo "<a href='?page=1'>FIRST</a>";
                        echo "<a href='?page=" . $previous . "'>&laquo;</a>";
                    }
                ?>

                <?php 
                    // PAGINACIÓN
                    for($i = 1; $i <= $total_pages; $i++){
                        echo "<a href='?page=" . $i . "'> " . $i . " </a>";
                    }
                ?>

                <?php 
                    // FLECHA SIGUIENTE
                    if ($page < $total_pages) {
                        echo "<a href='?page=" . $next . "'>&raquo;</a>";
                        echo "<a href='?page=" . $total_pages . "'>LAST</a>";
                    }
                ?>
            </div>
            <?php } else {
                echo "<h3>No post yet !!!!</h3>";
            } ?>
            <br><br>
        </div>

        <!-- Side widgets-->
        <?php include('includes/aside.php'); ?>
    </div>
</div>

<!-- Footer-->
<?php include('includes/footer.php'); ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

</body>
</html>
