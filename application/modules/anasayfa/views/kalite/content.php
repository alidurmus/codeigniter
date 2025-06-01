<div class="floating-shapes">
  <div class="shape"></div>
  <div class="shape"></div>
  <div class="shape"></div>
</div>

<div class="container-fluid">
  <div class="hero-section">
    <h1 class="hero-title pulse-animation">Kalite Kontrol</h1>
    <p class="hero-subtitle">Gelişmiş Kalite Yönetim Sistemi</p>
  </div>

  <div class="menu-container">
    <div class="menu-card">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10">
          <a href="<?php echo base_url(); ?>girdikontrol" class="control-btn btn-girdi d-block">
            <i class="fas fa-sign-in-alt btn-icon"></i>
            Girdi Kontrol
          </a>

          <a href="<?php echo base_url(); ?>proseskontrol" class="control-btn btn-proses d-block">
            <i class="fas fa-cogs btn-icon"></i>
            Proses Kontrol
          </a>

          <a href="<?php echo base_url(); ?>finalkontrol" class="control-btn btn-final d-block">
            <i class="fas fa-check-circle btn-icon"></i>
            Final Kontrol
          </a>

          <a href="<?php echo base_url('dashboard'); ?>" class="control-btn btn-yonetim d-block">
            <i class="fas fa-chart-line btn-icon"></i>
            Yönetim Paneli
          </a>

          <a href="<?php echo base_url('etiket'); ?>" class="control-btn btn-etiket d-block">
            <i class="fas fa-tags btn-icon"></i>
            Kutu No Etiket
          </a>
        </div>
      </div>
    </div>
  </div>
</div>




<





  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js">
  </script>
  <script>
    // Search functionality demo
    document.querySelector('.search-input').addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      const rows = document.querySelectorAll('#data-tbody tr');

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
          row.style.display = '';
          row.classList.add('fade-in');
        } else {
          row.style.display = 'none';
        }
      });
    });

    // Toggle between empty state and data content
    function toggleEmptyState() {
      const emptyState = document.getElementById('empty-state');
      const dataContent = document.getElementById('data-content');

      if (emptyState.style.display === 'none') {
        emptyState.style.display = 'block';
        dataContent.style.display = 'none';
      } else {
        emptyState.style.display = 'none';
        dataContent.style.display = 'block';
      }
    }

    // Add row hover effects
    document.querySelectorAll('#data-tbody tr').forEach(row => {
      row.addEventListener('mouseenter', function() {
        this.style.cursor = 'pointer';
      });

      row.addEventListener('click', function() {
        // Add click functionality here
        console.log('Row clicked:', this);
      });
    });

    // Enhanced search with debouncing
    let searchTimeout;
    document.querySelector('.search-input').addEventListener('input', function(e) {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(() => {
        // Real search would happen here
        console.log('Searching for:', e.target.value);
      }, 300);
    });
  </script>
  </body>

  </html>