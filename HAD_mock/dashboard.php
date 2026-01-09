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
    <link rel="stylesheet" href="styles/contact.css">
    <style>
        .footer-rights{
            text-align: center;
            color: black;
        }
         a{
            color: white;
            text-decoration: none;
        }
        :root{
    --bg:#1f5564;
    --card:#0f2e36;
    --text:#f7fbfc;
    --text-dim:#cfe3e8;
    --line:#2a7081;
    --chip:#174753;
    --good:#2ecc71;
    --moderate:#f1c40f;
    --unhealthy:#e67e22;
    --very-unhealthy:#e74c3c;
  }
  *{box-sizing:border-box}
  body{
    margin:0; min-height:100vh;
    background-color: #0F5E77;
    color:var(--text);
    font-family:system-ui,-apple-system,Segoe UI,Roboto,Inter,Arial,sans-serif;
    
  }
  .wrap{
    width:100%; max-width:720px; padding:24px;
    text-align:center;
  }

  /* Top controls */
  .controls{
    display:flex; gap:10px; justify-content:center; margin-bottom:16px;
  }
  .controls select, .controls button{
    background:var(--chip); color:var(--text);
    border:1px solid var(--line); padding:10px 12px; border-radius:10px;
    outline:none; cursor:pointer;
  }
  .controls button:hover{filter:brightness(1.06)}

  /* Central AQI card */
  .card{
    margin:0 auto; padding:24px; border-radius:16px;
    background:var(--card); border:1px solid var(--line);
    box-shadow:0 4px 12px rgba(0,0,0,.25);
    max-width:640px;
  }
  .title{
    font-size:1rem; color:var(--text-dim); margin-bottom:6px; letter-spacing:.2px;
  }
  .aqi{
    font-size:5.5rem; font-weight:800; line-height:1; margin:10px 0;
  }
  .status{
    font-size:1.6rem; font-weight:700; margin-bottom:14px;
    display:inline-block; padding:6px 14px; border-radius:999px;
    background:var(--chip); border:1px solid var(--line);
  }

  /* Info chips (small) */
  .chips{display:flex; gap:8px; justify-content:center; flex-wrap:wrap; margin-top:12px}
  .chip{
    background:var(--chip); border:1px solid var(--line);
    color:var(--text); padding:8px 10px; border-radius:999px; font-size:.95rem;
  }

  /* Footer line */
  .meta{
    margin-top:14px; font-size:.95rem; color:var(--text-dim);
  }
  .dashboard{
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



    <section class="dashboard"> 
  <div class="wrap">
    <!-- Minimal controls -->
    <div class="controls">
      <select id="location">
        <option value="auto">📍 Auto (current area)</option>
        <option value="sheffield" selected>Sheffield</option>
        <option value="leeds">Leeds</option>
        <option value="manchester">Manchester</option>
      </select>
      <button id="refresh">⟳ Refresh</button>
    </div>

    <!-- Central AQI card -->
    <div class="card" id="aqiCard">
      <div class="title">Air Quality Index (AQI)</div>
      <div class="aqi" id="aqiValue">72</div>
      <div class="status" id="aqiStatus">Moderate</div>

      <!-- Minimal extra info -->
      <div class="chips">
        <span class="chip" id="pm25">PM2.5: 17 µg/m³</span>
        <span class="chip" id="pm10">PM10: 28 µg/m³</span>
        <span class="chip" id="co2">CO₂: 820 ppm</span>
      </div>

      <div class="meta" id="meta">Last update 18:45 • Data shown is mock</div>
    </div>
  </div>

<script>
  // Mock data (replace with API later)
  const mock = {
    sheffield: { aqi: 72, pm25: 17, pm10: 28, co2: 820 },
    leeds:     { aqi: 46, pm25: 10, pm10: 20, co2: 700 },
    manchester:{ aqi: 128, pm25: 42, pm10: 65, co2: 900 }
  };

  const card   = document.getElementById('aqiCard');
  const aqiEl  = document.getElementById('aqiValue');
  const statEl = document.getElementById('aqiStatus');
  const pm25El = document.getElementById('pm25');
  const pm10El = document.getElementById('pm10');
  const co2El  = document.getElementById('co2');
  const metaEl = document.getElementById('meta');
  const locSel = document.getElementById('location');
  const btnRef = document.getElementById('refresh');

  function levelFor(aqi){
    if(aqi<=50)  return {label:'Good',           color:'var(--good)'};
    if(aqi<=100) return {label:'Moderate',       color:'var(--moderate)'};
    if(aqi<=150) return {label:'Unhealthy',      color:'var(--unhealthy)'};
    return {label:'Very Unhealthy', color:'var(--very-unhealthy)'};
  }

  function render(location){
    const data = mock[location] || mock.sheffield;
    aqiEl.textContent = data.aqi;
    const lvl = levelFor(data.aqi);
    statEl.textContent = lvl.label;
    // Accent the card border to match status
    card.style.borderColor = getComputedStyle(document.documentElement).getPropertyValue(lvl.color.replace('var','')).trim() || lvl.color;
    // Update chips
    pm25El.textContent = `PM2.5: ${data.pm25} µg/m³`;
    pm10El.textContent = `PM10: ${data.pm10} µg/m³`;
    co2El.textContent  = `CO₂: ${data.co2} ppm`;
    // Update timestamp
    const now = new Date();
    const fmt = new Intl.DateTimeFormat(undefined, {hour:'2-digit', minute:'2-digit'});
    metaEl.textContent = `Last update ${fmt.format(now)} • Data shown is mock`;
  }

  locSel.addEventListener('change', e => render(e.target.value));
  btnRef.addEventListener('click', () => render(locSel.value));

  // Initial render
  render(locSel.value);
  
</script>
  </section>
</body>
</html>
