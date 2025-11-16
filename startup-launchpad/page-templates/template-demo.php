<?php
/* Template Name: Product Demo */
get_header(); ?>
<section class="main">
  <div class="container">
    <h2>Product demos</h2>
    <p class="lead">Showcase interactive product screenshots, feature bullets, and short explainer videos.</p>

    <div class="demo-grid">
      <?php // Example hard-coded demo cards. In real use, create a 'demo' CPT or use custom fields. ?>
      <div class="card">
        <h3>Live Demo: Dashboard</h3>
        <p>Interactive walkthrough of dashboard metrics.</p>
        <a class="button" href="#">Watch demo</a>
      </div>
      <div class="card">
        <h3>API Explorer</h3>
        <p>Try our endpoints with example calls.</p>
        <a class="button" href="#">Open explorer</a>
      </div>
      <div class="card">
        <h3>Collaboration</h3>
        <p>Invite teammates and track progress.</p>
        <a class="button" href="#">See features</a>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
