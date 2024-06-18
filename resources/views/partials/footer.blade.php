<footer class="footer-container">
    <div class="nav-container_footer">
    <img loading="lazy" src="{{ asset('storage/logo_putih.png') }}" alt="Company Logo" class="logo_footer" />
    <a href="{{ url('/dashboard') }}" class="nav-item">Resep</a>
        <a href="{{ route('reseps.create') }}" class="nav-item">Unggah Resepmu</a>
        <a href="{{ route('profile.index') }}" class="nav-item">Profile</a>
        <section class="follow-us-container">
        <div class="nav-item">Ikuti kami</div>
            <div class="social-icons">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/df33386d044e4c5dbefa0b3031f0902e6f3bc94f3b1893bf8d51f7c587f56a82?apiKey=e1675c5ee09e452485756796825e17bc&" alt="Social Media Icon 1" class="social-icon" />
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/742b513c6116b9d99e625bc3f2b37d4fef1a12d63099f210e82b246ea5e2ba5a?apiKey=e1675c5ee09e452485756796825e17bc&" alt="Social Media Icon 2" class="social-icon-larger" />
            </div>
        </section>
    </div>
</footer>
