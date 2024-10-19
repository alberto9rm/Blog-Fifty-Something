<?php include('header.php'); ?>

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
                    $search = $_POST['search'];                             
                    $sql = "SELECT * FROM post WHERE title LIKE '%$search%' 
                         OR category LIKE '%$search%' OR users LIKE '%$search%' ";
                    $resultado = $base->prepare($sql);
                    $resultado->execute();
                    $register = $resultado->rowCount();

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
        </div>
        <!-- Side widgets-->
        <?php include('aside.php'); ?>
    </div>
</div>

<!-- Footer-->
<?php include('footer.php'); ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

</body>
</html>
