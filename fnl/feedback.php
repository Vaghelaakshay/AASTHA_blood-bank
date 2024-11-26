<?php require_once 'header.php'; ?>
<style>
    .feedCon {
        background-color: #fff;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
    }
    h1 {
        margin-bottom: 20px;
        font-size: 24px;
        text-align: center;
        color: #333;
    }
    .form-group {
    margin-bottom: 15px;
}
.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}
.form-group input, .form-group select, .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
    &:focus {
        border-color: #007bff;
        outline: none;
    }
}
.bn {
        width: 100%;
        padding: 10px 0;
        background-color: #d42a2a;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;

        &:hover {
            background-color: #0056b3;
        }
    }
</style>
<main>
    <div class="bg">
        <div class="feedCon">
            <h1>Feedback</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select id="rating" name="rating" required>
                        <option value="">Select rating</option>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="comments">Message:</label>
                    <textarea id="comments" name="message" rows="4" required></textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="bn" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require_once "footer.php"; ?>


<?php
if (isset($_POST['submit'])) {
    $feedback_name = $_POST['name'];
    $feedback_mail = $_POST['email'];
    $feedback_rate = $_POST['rating'];
    $feedback_msg = $_POST['message'];
    $values = ['f_name' => $feedback_name, 'f_mail' => $feedback_mail, 'f_message' => $feedback_msg, 'f_rating' => $feedback_rate];
    if ($obj->insert('feedback', $values)) {
        echo "thanks for give feedback";

        header("Location:index.php");
        exit();
    } else {
        echo "please, try again";
    }
} ?>