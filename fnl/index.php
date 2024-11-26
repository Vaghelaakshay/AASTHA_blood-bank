<?php require_once 'header.php'; ?>
<main>

  <div class="section1">
    <div class="banner">
      <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="./uploads/setting/onebanner.png" />
          <!-- <div class="text">Caption Text</div> -->
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="./uploads/setting/secondbanner.png" />
          <!-- <div class="text">Caption Two</div> -->
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="./uploads/setting/threebanner.png" />
          <!-- <div class="text">Caption Three</div> -->
        </div>
      </div>
    </div>

    <div style="text-align: center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </div>

  <div class="section2" 
    style="margin-bottom: -70px;">
  <table>
    <tr>
      <td>
        <div class="info">
          <h2>Learn About Donation</h2>
          <img class="table-img" src="./uploads/setting/blood.png" alt="blood donation process">
          <button class="red"><a href="./lookingBlood.php" style="color: white; text-decoration: none;">Donate Now</a></button>
        </div>
      </td>
      <td>
      </td>
      <td>
        <div class="list-process">
          <h2>Blood Donation</h2>

          <div class="container">
            <details>
              <summary>Step 1: Registration</summary>
              <p>You will be asked to complete a registration form with your personal details.</p>
            </details>
            <details>
              <summary>Step 2: Health Screening</summary>
              <p>A medical professional will conduct a quick screening to check your health status.</p>
            </details>
            <details>
              <summary>Step 3: Donation</summary>
              <p>The blood donation takes about 10 minutes. A medical professional collects 1 pint of blood.</p>
            </details>
            <details>
              <summary>Step 4: Rest & Refreshment</summary>
              <p>After donating, you can rest and have refreshments for 10-15 minutes.</p>
            </details>
            <details>
              <summary>Step 5: Blood Testing</summary>
              <p>Your blood will be tested for infectious diseases to ensure it is safe for use.</p>
            </details>
          </div>

          <button class="register-btn"><a href="./donor/donor.registration.php" style="color: white; text-decoration: none;">Get Registered</a></button> 
        </div>
      </td>
      <td></td>
      <td>
        <img src="./uploads/setting/table.png" alt="" style="height:60vh;width:455.33px;" >
      </td>
    </tr>
  </table>
</div>
</div>

  <div class="section3">
      <div class="wrapper">
        <?php
        $obj->sql("SELECT * FROM feedback WHERE f_rating > 3");
        $values = $obj->getResult();
        // var_dump($values);
        $itemCount = count(value: $values);
        $animationDuration = 30;
        $leftPosition = max(350 * $itemCount, 100);

        foreach ($values as $index => $item) {
          $delay = ($animationDuration / $itemCount) * ($itemCount - $index - 1) * -1;
          echo "<div class='item' style='left: {$leftPosition}px; animation-delay: {$delay}s;'>
    <blockquote>
      <p>{$item['f_message']}</p>
      </blockquote>
  <div class='reviewer'>
    <span class='name'>
      <span class='name'>{$item['f_mail']}</span>
    </div></div>";
        }
        ?>
      </div>
    <!-- </div> -->
  </div>


</main>
<script src="script.js"></script>
<?php require_once 'footer.php' ?>