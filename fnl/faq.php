<?php require_once 'header.php'; ?>
<main>
    <div class="bg">
    <?php
    $obj->select('faqs');
    $result = $obj->getResult();
    //    echo"<pre>"; var_dump($result); echo"</pre>";
    foreach ($result as $values) : ?>
        <div class="faq-container">
            <div class="faq-question"><?php echo $values['f_que'] ?></div>
            <div class="faq-answer"><?php echo $values['f_ans'] ?></div>
        </div>

    <?php endforeach; ?>
    </div>
</main>
 <?php require_once "footer.php"; ?>