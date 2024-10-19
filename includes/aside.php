<!-- Side widgets-->
<div class="col-lg-4">
    <?php if(isset($_SESSION['id'])): ?>
        <a class="btn btn-primary mb-3" href="create_post.php?id=<?php echo $_SESSION['id'] ?>">Create Post</a>
    <?php endif; ?>
    
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-body">
            <div>
                <form action="includes/search.php" method="post" class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..." 
                           name="search" aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="search" type="submit">Go!</button>
                </form>
            </div>
        </div>
    </div>

    <?php 
        $sql= "SELECT DISTINCT category FROM post";
        $resultado = $base->prepare($sql);
        $resultado->execute();
        $register_post = $resultado->rowCount();
    ?>

    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <?php if($register_post < 1) {
                        echo "No categories available";
                    } else { ?>
                        <ul class="list-unstyled mb-0">
                            <?php foreach($resultado as $datos): ?>
                                <li><a href="includes/category.php?id=<?php echo $datos['category'] ?>">
                                        <?php echo $datos['category'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Side widget-->
    <div class="card mb-4">
        <?php
            $sql = "SELECT id, users, img_url FROM login";
            $resultado = $base->prepare($sql);
            $resultado->execute();
            $register = $resultado->rowCount();

            if(!isset($_SESSION['id'])) {
        ?>
            <div class="card-header">Information: You must login to view profiles.</div>
        <?php } else { ?>
            <div class="card-header">Information:</div>
            <div class="card-body">
                Registered Users:
                <?php if ($register < 1) {
                    echo "No users yet..";
                } else {
                    echo $register . "<br>";
                    foreach($resultado as $datos):
                        $id_user = $datos['id'];
                ?>
                    <a href="../perfil.php?id=<?php echo $id_user; ?>">
                        <img class="rounded-circle" src="assets/img/<?php echo $datos['img_url'] ?>"
                             alt="..." width="38px" height="38px" />
                    </a>
                <?php endforeach; } ?>
            </div>
        <?php } ?>
    </div>
</div>
