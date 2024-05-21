<?php include_once __DIR__ . '/header_en.php'?>
<div class="contact">
    <main class="hero">
        <div class="hero_content">
            <h1>
                <span>Contact <-> Contact us for any quotation or inquiry</span>
            </h1>
        </div>
    </main>
    <section class="section_content">
        <h1 class="title">
            <?php echo $title?>
        </h1>
        <div class="section_div">
            <?php include_once __DIR__ . '/../templates/alerts.php';?>
            <p>If you are looking to get info about chatbots, AI bots, conversational marketing, or web development, Inbotscr can assist you.</p>
            <p>This is the place where we address doubts and inquiries. Just leave us your details and inquiry, and you will soon receive a response.</p>
            <form action="/contact" class="form" method="POST">
                <div class="field">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Your name" required>
                </div>

                <div class="field">
                    <label for="lastname">Lastname:</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Your lastname">
                </div>
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Your email" required>
                </div>

                <div class="field">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
                </div>

                <input type="submit" class="button" value="Send Message">
            </form>

        </div>
    </section>
</div>
<?php include_once __DIR__ . '/footer_en.php'?>