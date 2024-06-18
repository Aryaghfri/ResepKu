
<!-- <header class="header">
  <div class="navigation-container-header">
    <img loading="lazy" src="storage/logo_orange.png" alt="Company Logo" class="logo_header" />
    <div class="nav-container-header">
      <a href="#" class="nav-link">Resep</a>
      <a href="#" class="nav-link">Unggah Resepmu</a>
      <a href="#" class="nav-link">Favorit</a>
    </div>
    <a href="#" class="logout-section">
      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2162a8f368ac0e925a05447f7100c41726edb2e1394f6e4eb9585c4c176ed675?apiKey=e1675c5ee09e452485756796825e17bc&" alt="Logout Icon" class="logout-img" />
      <div >Keluar</div>
    </a>
  </div>
</header>
<div class="div">
</div> -->



<header class="header">
  <div class="navigation-container-header">
    <img loading="lazy" src="{{ asset('storage/logo_orange.png') }}" alt="Company Logo" class="logo_header" />
    <div class="nav-container-header">
      <a href="{{ url('/dashboard') }}" class="nav-link">Resep</a>
      <a href="{{ route('reseps.create') }}" class="nav-link">Unggah Resepmu</a>
      <a href="{{ route('profile.index') }}" class="nav-link">Profile</a>
    </div>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="logout-section">
      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2162a8f368ac0e925a05447f7100c41726edb2e1394f6e4eb9585c4c176ed675?apiKey=e1675c5ee09e452485756796825e17bc&" alt="Logout Icon" class="logout-img" />
      <div>Keluar</div>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</header>
<div class="div">
</div>

