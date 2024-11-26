<?php require_once "header.php"; 
$obj->select('gallery'); 
$result = $obj->getResult(); ?>
<style>
    div.scroll-container {
        overflow-y: auto;
        white-space: normal; 
        padding: 10px;
        height: 500px; 
    }

    div.scroll-container img {
       
        height: 185px;
        width: 183px;
        display: block; 
        margin-bottom: 10px; 
    }
    .container {
        position: relative;
        height: fit-content;
        display: none;
    }
    .closebtn {
        position: absolute;
        top: 10px;
        right: 15px;
        color: white;
        font-size: 35px;
        cursor: pointer;
    }
</style>
<main>
    <div class="bg" style="display: flex;" >
    <div class="scroll-container">
        <?php
        foreach ($result as $values) :
            if ($values['g_type'] == 'photo') : ?>
                <img src="<?= str_replace('..', '.', $values['g_path']) ?>" onclick="myFunction(this);">
        <?php endif;
        endforeach; ?>
    </div>

    <div class="container">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:135vh;height: 71vh;">
        <div id="imgtext"></div>
    </div>
    </div>
</main>
<script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
</script>
<?php require_once "footer.php"; ?>
