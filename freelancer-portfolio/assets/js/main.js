// Simple interactions: reveal on scroll, smooth scroll, and AJAX contact
(function(){
    // Reveal elements on scroll
    function revealOnScroll() {
        var reveals = document.querySelectorAll('.reveal');
        var obs = new IntersectionObserver(function(entries){
            entries.forEach(function(entry){
                if(entry.isIntersecting){
                    entry.target.classList.add('visible');
                    obs.unobserve(entry.target);
                }
            });
        }, {threshold: 0.12});
        reveals.forEach(function(r){ obs.observe(r); });
    }

    // Smooth anchor scroll
    function smoothAnchors() {
        document.querySelectorAll('a[href^="#"]').forEach(function(a){
            a.addEventListener('click', function(e){
                var href = this.getAttribute('href');
                if(href.length > 1){
                    e.preventDefault();
                    var target = document.querySelector(href);
                    if(target) target.scrollIntoView({behavior:'smooth', block: 'start'});
                }
            });
        });
    }

    // Contact form AJAX
    function contactForm() {
        var form = document.getElementById('fp-contact-form');
        if(!form) return;
        var status = document.getElementById('fp-form-status');
        form.addEventListener('submit', function(e){
            e.preventDefault();
            var btn = document.getElementById('fp-submit');
            btn.disabled = true;
            status.textContent = 'Sending...';
            var data = new FormData(form);
            data.append('action', 'fp_send_contact');
            data.append('nonce', fp_vars.nonce);
            fetch(fp_vars.ajax_url, {
                method: 'POST',
                credentials: 'same-origin',
                body: data
            }).then(function(r){ return r.json(); })
            .then(function(json){
                if(json.success){
                    status.textContent = json.data.message || 'Message sent.';
                    form.reset();
                } else {
                    status.textContent = json.data?.message || 'There was an error.';
                }
            }).catch(function(){
                status.textContent = 'Network error. Try again.';
            }).finally(function(){ btn.disabled = false; });
        });
    }

    document.addEventListener('DOMContentLoaded', function(){
        revealOnScroll();
        smoothAnchors();
        contactForm();
    });
})();
