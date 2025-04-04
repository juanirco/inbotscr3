<footer class="footerbar" id="footer">
    <div class="footer-container">
        <div class="footer-links">
            <h3>Links</h3>
            <ul class="links-list">
                <li><a href="/en">Home</a></li>
                <li><a href="/about_us">About Us</a></li>
                <li><a href="/ai_bots">Smartbots</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h3>Contact</h3>
            <div class="info_contact">
                <p>info@inbotscr.com</p>
                <p>+506 8906-7373</p>
                <p>Costa Rica</p>
            </div>
        </div>
        <div class="footer-socialMedia">
            <h3>Social</h3>
            <ul class="links-list">
                <li><a href="https://www.facebook.com/inbotscr">Facebook</a></li>
                <li><a href="https://www.instagram.com/inbotscr">Instagram</a></li>
                <li><a href="https://www.linkedin.com/company/inbotscr">LinkedIn</a></li>
            </ul>
        </div>
    </div>
    <div class="politics">
        <div class="laws">
            <a href="/terms">Terms</a>
            <p>|</p>
            <a href="/privacy">Privacy Policy</a>
        </div>
        <p class="copyright"><?php echo date('Y')?> &copy; All rights reserved by Inbotscr</p>
    </div>
</footer>
<?php 
    $script .= '<script src="build/js/app.js"></script>';
    $script .= '<script src="https://app.inbotscr.com/webchat/plugin.js?v=6"></script>';
    $script .= '<script>ktt10.setup({id:"XVtrY3u6IN6sP",accountId:"1222873",color:"#006dff"})</script>';
    // Google tag (gtag.js)
    $script .= '<script async src="https://www.googletagmanager.com/gtag/js?id=G-T7W1RVDXJ4"></script>';
    $script .= '<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag("js", new Date());
    gtag("config", "G-T7W1RVDXJ4");
    </script>';
?>
