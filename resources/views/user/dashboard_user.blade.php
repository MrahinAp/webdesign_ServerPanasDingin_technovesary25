@extends('layouts.app')

@section('content')
<div class="dashboard-container" style="display:flex; min-height:100vh;">
  <!-- Sidebar -->
  <div style="width:250px; background-color:#1b5e20; color:white; padding:20px;">
    <h2>🌿 EcoBank</h2>
    <p>Dashboard User</p>
    <ul style="list-style:none; padding:0;">
      <li><a href="#" style="color:white;">Profile</a></li>
      <li><a href="#" style="color:white;">Dashboard</a></li>
      <li><a href="#" style="color:white;">Riwayat</a></li>
      <li><a href="#" style="color:white;">Nabung sampah</a></li>
    </ul>
  </div>

  <!-- Konten -->
  <div style="flex:1; background-color:#f0fff4; padding:40px;">
    <h2>Selamat Datang, {{ $user->username }}</h2>

    <div style="display:flex; gap:50px; margin-top:40px; align-items:center;">
      <!-- Pohon -->
      <div style="background:white; padding:20px; border-radius:10px; text-align:center; width:250px; height:300px; position:relative;">
        <div id="tree" style="width:100px; height:100px; margin:0 auto; background:url('{{ asset('images/pohon_tunas.png') }}') no-repeat center/contain; transform-origin:bottom center;">
        </div>
        <p style="margin-top:10px; font-weight:bold;" id="treeStage">Loading...</p>
        <p>( <span id="points">{{ $user->points }}</span> Poin )</p>
      </div>

      <!-- Statistik -->
      <div style="background:white; padding:20px; border-radius:10px;">
        <canvas id="chart" width="300" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
      datasets: [{
        label: 'Total Sampah (Kg)',
        data: [5, 10, 8, 12, 15],
        borderWidth: 1
      }]
    },
  });

  // JS untuk pohon tumbuh
  const points = parseInt(document.getElementById('points').innerText);
  const tree = document.getElementById('tree');
  const stage = document.getElementById('treeStage');

  let image = 'pohon_tunas.png';
  let label = 'Pohon Tunas';
  let scale = 0.5;

  if (points > 0 && points <= 50) {
    image = 'pohon_muda.png';
    label = 'Pohon Muda';
    scale = 0.8;
  } else if (points > 50 && points <= 100) {
    image = 'pohon_remaja.png';
    label = 'Pohon Remaja';
    scale = 1.1;
  } else if (points > 100) {
    image = 'pohon_besar.png';
    label = 'Pohon Besar';
    scale = 1.4;
  }

  // Animasi tumbuh
  tree.style.transition = 'transform 1s ease-out';
  tree.style.backgroundImage = `url('/images/${image}')`;
  tree.style.transform = `scale(${scale})`;
  stage.innerText = label;
</script>
@endsection
