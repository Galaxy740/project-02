
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand btn btn-warning " href="read.php">Home</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <a class="navbar-brand btn btn-warning " href="search.php">Search</a>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user_type']) == 'admin') { ?>
            <a class="navbar-brand btn btn-warning" href="create.php">Add new flight</a>
            <?php }?>

        </ul>
    </div>
</nav>
