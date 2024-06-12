<?php include "../App/Views/Fixed Elements/header.php" ?>

<!-- <script>
<?php require_once '../App/Views/Communicators/Home.js'?>
</script> -->

<script src="../App/Views/Communicators/Home.js"></script>

<main class="d-flex g-1 flex-column">
    <form>
        <input class="addTask" placeholder="New task">
        <button class="add-btn"><i class="fa-solid fa-plus"></i></button>
    </form>
    <ul class='d-flex g-1 flex-column justify-content-between'>
        <?php foreach ($data as $habit) : ?>
            <li class='d-flex g-1 align-items-center justify-content-between' isDone=<?php echo $habit["is_done"] ?>>
                <p><?php echo $habit["habit"] ?></p>
                <div class='d-flex g-1 align-items-center'>
                    <button class="delete-btn" id="<?php echo $habit['habit_id'] ?>">
                        <i class='fa-solid fa-trash-can'></i>
                    </button>
                    <form>
                        <input class="input<?php echo $habit['habit_id'] ?>" placeholder='Edit task' />
                        <button class="edit-btn" id="<?php echo $habit['habit_id'] ?>">
                            <i class='fa-solid fa-pencil'></i>
                        </button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php include "../App/Views/Fixed Elements/footer.php" ?>