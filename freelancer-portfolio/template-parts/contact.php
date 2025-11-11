<section id="contact" class="fp-section fp-contact">
    <div class="fp-container">
        <h3 class="section-title">Contact</h3>
        <form id="fp-contact-form" class="fp-form" method="post" action="#">
            <div class="fp-form-row">
                <label for="fp-name">Name</label>
                <input id="fp-name" name="name" type="text" required>
            </div>
            <div class="fp-form-row">
                <label for="fp-email">Email</label>
                <input id="fp-email" name="email" type="email" required>
            </div>
            <div class="fp-form-row">
                <label for="fp-message">Message</label>
                <textarea id="fp-message" name="message" rows="6" required></textarea>
            </div>
            <div class="fp-form-row">
                <button id="fp-submit" class="fp-btn" type="submit">Send Message</button>
                <div id="fp-form-status" role="status" aria-live="polite"></div>
            </div>
        </form>
    </div>
</section>
