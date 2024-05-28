<?php include_once __DIR__ . '/header.php'?>
<div class="contact">
    <main class="hero">
        <div class="hero_content">
            <h1>
                <span>Contacto <-> Contactanos para cualquier cotizacion o consulta</span>
            </h1>
        </div>
    </main>
    <section class="section_content">
        <h1 class="title">
            <?php echo $title?>
        </h1>
        <div class="section_div">
            <?php include_once __DIR__ . '/../templates/alerts.php';?>
            <p>Si buscas cotizar sobre chatbots, bots con inteligencia artificial, marketing conversacional o desarrollo web, en Inbotscr te ayudamos.</p>
            <p>Este es el sitio donde te respondemos cualquier duda o consulta, solo dejanos tus datos y la consulta y muy pronto tendrás una respuesta.</p>
            <form action="/contacto" class="form" method="POST">
                <div class="field">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" placeholder="Tu nombre" required>
                </div>
        
                <div class="field">
                    <label for="lastname">Apellido:</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Tu apellido">
                </div>
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Tu email" required>
                </div>

                <div class="field">
                <label for="message">Mensaje:</label>
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Tu Mensaje" required></textarea>
                </div>

            <!-- Añadir reCAPTCHA widget -->
            <div class="g-recaptcha" data-sitekey="6LeOBOspAAAAAIrIlgdjNUC_lxQqARPZ8leibTi1"></div>

            <input type="submit" class="button" value="Enviar Mensaje">
        </form>
</div>
<?php include_once __DIR__ . '/footer.php'?>