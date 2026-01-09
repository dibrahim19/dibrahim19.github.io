<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$isloggedin = !empty($_SESSION['logged_in']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&">
    <link rel="stylesheet" href="styles/about.css">

    <style>
        .home-div{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        a{
            color: white;
            text-decoration: none;
        }
        .title{
            font-size: 40px;
            font-weight: 600;
        }
        .text{
            font-size: 30px;
            width: 600px;
            margin-top: 80px;
        }
        .btn{
            background-color: white;
            color: black;
            width: 70px;
            height: 50px;
            border: none;
            border-radius: 30px;
            margin-top: 30px;
        }

        .testimonials-div{
            background-color: #34A0A4;
            width: 440px;
            border-radius: 30px;
            height: 100px;
        }

        .testimonial-text{
            text-align: center;
            
        }

        .outer-testimonials-div{
            display: flex;
            justify-content: center;
            gap: 17px;
        }
        h1{
            color: white;
            text-align: center;
        }
        .footer-rights{
            text-align: center;
            color: black;
        }
        :root{
    --bg:#1f5564; --card:#0f2e36; --chip:#174753; --line:#2a7081;
    --text:#f7fbfc; --text-dim:#cfe3e8;
  }
  *{box-sizing:border-box}
  body{
    margin:0; min-height:100vh; background:linear-gradient(180deg,#1f5564, #1e5160);
    color:var(--text); font-family:system-ui,-apple-system,Segoe UI,Roboto,Inter,Arial,sans-serif;
    background-color: #0F5E77;
    
  }
  .wrap{width:100%; max-width:740px}
  .title{font-weight:800; font-size:1.4rem; margin-bottom:12px; letter-spacing:.2px}
  .controls{display:flex; gap:10px; flex-wrap:wrap; margin-bottom:14px}
  button{
    background:var(--chip); border:1px solid var(--line); color:var(--text);
    padding:10px 14px; border-radius:10px; cursor:pointer;
  }
  button:hover{filter:brightness(1.06)}
  .badge{display:inline-block; padding:4px 10px; border-radius:999px; background:#113d47; border:1px solid var(--line); color:var(--text-dim); font-size:.85rem}
  .card{
    background:var(--card); border:1px solid var(--line); border-radius:16px;
    padding:18px; box-shadow:0 4px 12px rgba(0,0,0,.25);
  }
  .row{display:flex; gap:16px; align-items:center; justify-content:space-between; flex-wrap:wrap}
  .main{display:flex; align-items:center; gap:16px}
  .temp{font-size:3.2rem; font-weight:800; line-height:1}
  .condition{font-size:1.2rem; color:var(--text-dim)}
  .chips{display:flex; gap:8px; flex-wrap:wrap; margin-top:10px}
  .chip{background:var(--chip); border:1px solid var(--line); padding:8px 10px; border-radius:999px}
  .advice{margin-top:16px; padding:14px; border-radius:12px; background:rgba(0,0,0,.15); border:1px solid var(--line)}
  .advice li{margin:6px 0}
  .meta{font-size:.95rem; color:var(--text-dim); margin-top:10px}
  .err{margin-top:12px; color:#ffd0d0}
  .location_advice{
    display:flex;
    justify-content:center;
    align-items:center;
  }
    </style>
</head>
<body>
    <section class="header">
        <div class="header-div">
            <div class="left-section">
                <img class="logo" src="logo.png" alt="">
            </div>
            <div class="right-section">
                <a href="home.php"><p>Home</p></a> 
                <a href="advice.php"><p>Advice</p></a> 
                <a href="contact.php"><p>Contact us</p></a>
                <a href="dashboard.php"><p>Dashboard</p></a> 
                    <?php
                    if ($isloggedin): ?>
                    <a href="user_dashboard.php">User hub</a>
                    <a href="logout.php">logout</a>
                    <?php else: ?>
                    <a href="register.php"><p>Log in/Register</p></a>
                    <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="location_advice">

    
  <div class="wrap">
    <div class="title">Personalised Health Advice based on your local weather</div>

    <div class="controls">
      <button id="btnUseMyLocation">📍 Use my location</button>
      <button id="btnRefresh">⟳ Refresh</button>
      <span id="status" class="badge">Waiting…</span>
    </div>

    <div class="card" id="card">
      <div class="row">
        <div class="main">
          <img id="icon" alt="" width="64" height="64" />
          <div>
            <div id="place" style="font-size:1.2rem; font-weight:700">—</div>
            <div id="cond" class="condition">—</div>
          </div>
        </div>
        <div class="temp" id="temp">—°C</div>
      </div>

      <div class="chips">
        <span class="chip" id="feels">Feels like: —°C</span>
        <span class="chip" id="wind">Wind: — m/s</span>
        <span class="chip" id="hum">Humidity: —%</span>
        <span class="chip" id="precip">Precip: —</span>
      </div>

      <ul class="advice" id="adviceList">
        <li>Advice will appear here after we get your weather.</li>
      </ul>

      <div class="meta" id="meta">—</div>
      <div class="err" id="error"></div>
    </div>
  </div>

<script>
  // ======= Helpers =======
  const $ = (id) => document.getElementById(id);
  const statusBadge = $('status');
  function setStatus(text){ statusBadge.textContent = text; }

  function getBrowserLocation(options={enableHighAccuracy:false, timeout:7000, maximumAge:0}){
    return new Promise((resolve, reject)=>{
      if(!('geolocation' in navigator)) return reject(new Error('Geolocation not supported'));
      navigator.geolocation.getCurrentPosition(
        pos => resolve({lat: pos.coords.latitude, lon: pos.coords.longitude, source:'geolocation'}),
        err => reject(err),
        options
      );
    });
  }

  async function getIpLocation(){
    const res = await fetch('/iploc.php');
    if(!res.ok) throw new Error('IP location failed');
    const d = await res.json();
    return { lat: d.latitude, lon: d.longitude, city: d.city, country: d.country_name, source:'ip' };
  }

  async function fetchWeather(lat, lon){
    const res = await fetch(`/weather.php?lat=${lat}&lon=${lon}`);
    if(!res.ok) throw new Error('Weather fetch failed');
    return res.json();
  }

  function buildAdvice(w){
    const lines = [];
    const temp = w.main?.temp ?? 0;
    const feels = w.main?.feels_like ?? temp;
    const main = (w.weather?.[0]?.main || '').toLowerCase();
    const desc = (w.weather?.[0]?.description || '').toLowerCase();
    const wind = w.wind?.speed ?? 0;
    const humidity = w.main?.humidity ?? 0;
    const rain = (w.rain && (w.rain['1h'] || w.rain['3h'])) ? (w.rain['1h'] || w.rain['3h']) : 0;
    const snow = (w.snow && (w.snow['1h'] || w.snow['3h'])) ? (w.snow['1h'] || w.snow['3h']) : 0;

    if (main.includes('thunderstorm')) lines.push('Stay indoors where possible—avoid open areas and metal objects.');
    if (snow > 0 || main.includes('snow')) lines.push('Wear insulated layers and non‑slip boots; watch for ice on pavements/roads.');
    if (rain > 0 || main.includes('rain') || desc.includes('drizzle')) lines.push('Carry a waterproof jacket/umbrella; take care on slippery surfaces.');
    if (main.includes('fog') || main.includes('mist')) lines.push('Low visibility—use lights when cycling/driving and slow down.');

    if (feels >= 27)      lines.push('Hydrate regularly, seek shade at midday, and ease off strenuous activity.');
    else if (feels <= 5)  lines.push('Dress in warm layers, cover extremities, and limit long outdoor periods.');
    else                  lines.push('Comfortable temps—great time for a walk; keep hydrated.');

    if (wind >= 10)       lines.push('Strong winds—secure loose items; cyclists take extra care with crosswinds.');
    if (humidity >= 80 && feels > 18) lines.push('Humidity is high—pace yourself and choose breathable clothing.');

    const unique = [...new Set(lines)];
    return unique.slice(0, 4);
  }

  function render(w, metaSource){
    const name = (w.name || 'Your area');
    const country = w.sys?.country ? `, ${w.sys.country}` : '';
    const iconCode = w.weather?.[0]?.icon;
    const condition = w.weather?.[0]?.description || '—';
    const temp = Math.round(w.main?.temp);
    const feels = Math.round(w.main?.feels_like);
    const wind = (w.wind?.speed ?? 0).toFixed(1);
    const humidity = w.main?.humidity ?? '—';
    const precip = w.rain?.['1h'] || w.rain?.['3h'] || w.snow?.['1h'] || w.snow?.['3h'] || 0;

    $('place').textContent = `${name}${country}`;
    $('cond').textContent = condition.charAt(0).toUpperCase() + condition.slice(1);
    $('temp').textContent = `${temp}°C`;
    $('feels').textContent = `Feels like: ${feels}°C`;
    $('wind').textContent = `Wind: ${wind} m/s`;
    $('hum').textContent = `Humidity: ${humidity}%`;
    $('precip').textContent = `Precip: ${precip ? precip+' mm' : 'None'}`;
    if(iconCode){
      $('icon').src = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;
      $('icon').alt = condition;
    }

    const advice = buildAdvice(w);
    $('adviceList').innerHTML = advice.map(line => `<li>${line}</li>`).join('');

    const now = new Date();
    const fmt = new Intl.DateTimeFormat(undefined, {hour:'2-digit', minute:'2-digit'});
    $('meta').textContent = `Last update ${fmt.format(now)} • Source: ${metaSource}`;
    $('error').textContent = '';
    setStatus('Ready');
  }

  async function loadWeather(){
    setStatus('Locating…');
    try{
      let loc;
      try { loc = await getBrowserLocation(); }
      catch { loc = await getIpLocation(); }

      setStatus('Fetching weather…');
      const w = await fetchWeather(loc.lat, loc.lon);
      render(w, loc.source);
    }catch(err){
      console.error(err);
      $('error').textContent = err.message || 'Something went wrong. Please try again.';
      setStatus('Error');
    }
  }

  $('btnUseMyLocation').addEventListener('click', loadWeather);
  $('btnRefresh').addEventListener('click', loadWeather);
  loadWeather(); // Auto-run on load
</script>
</body>
</html>
</section>
