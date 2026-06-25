<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portofolio Web Developer - Mahasiswa D3 Teknologi Informasi, spesialis Laravel, PHP, dan desain UI/UX modern." />
  <meta name="keywords" content="web developer, laravel, php, portfolio, UI/UX, mahasiswa TI" />
  <title>Portfolio | Web Developer & IT Student</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- AOS Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

  <style>
    /* ===== CSS VARIABLES ===== */
    :root {
      --primary: #2563EB;
      --primary-light: #3B82F6;
      --secondary: #0F172A;
      --accent: #38BDF8;
      --accent2: #818CF8;
      --bg: #0F172A;
      --bg2: #1E293B;
      --bg3: #0A0F1E;
      --glass: rgba(255,255,255,0.05);
      --glass-border: rgba(255,255,255,0.08);
      --text: #F1F5F9;
      --text-muted: #94A3B8;
      --text-dim: #64748B;
      --card-bg: rgba(30, 41, 59, 0.7);
      --shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
      --radius: 16px;
      --radius-sm: 8px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    [data-theme="light"] {
      --bg: #F0F4FF;
      --bg2: #E2E8F0;
      --bg3: #DBEAFE;
      --glass: rgba(255,255,255,0.6);
      --glass-border: rgba(37,99,235,0.15);
      --text: #0F172A;
      --text-muted: #475569;
      --text-dim: #94A3B8;
      --card-bg: rgba(255,255,255,0.75);
    }

    /* ===== RESET & BASE ===== */
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
      overflow-x: hidden;
      transition: background-color 0.4s ease, color 0.4s ease;
    }
    a { color: inherit; text-decoration: none; }
    img { max-width: 100%; }
    ul { list-style: none; }
    section { padding: 100px 0; }

    /* ===== LOADING SCREEN ===== */
    #loader {
      position: fixed; inset: 0;
      background: var(--secondary);
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      z-index: 9999;
      transition: opacity 0.6s ease, visibility 0.6s ease;
    }
    #loader.hidden { opacity: 0; visibility: hidden; }
    .loader-logo {
      font-size: 3rem; font-weight: 900;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 20px;
      animation: pulse 1.5s ease-in-out infinite;
    }
    .loader-bar {
      width: 200px; height: 3px;
      background: var(--glass);
      border-radius: 99px; overflow: hidden;
    }
    .loader-bar-fill {
      height: 100%;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      border-radius: 99px;
      animation: load 1.8s ease forwards;
    }
    @keyframes load { from { width: 0; } to { width: 100%; } }
    @keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: 0.6; } }

    /* ===== SCROLLBAR ===== */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--bg2); }
    ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 99px; }

    /* ===== NAVBAR ===== */
    #navbar {
      position: fixed; top: 0; left: 0; right: 0;
      z-index: 1000;
      padding: 16px 0;
      transition: var(--transition);
      backdrop-filter: blur(0px);
    }
    #navbar.scrolled {
      background: rgba(15,23,42,0.85);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--glass-border);
      padding: 10px 0;
    }
    [data-theme="light"] #navbar.scrolled {
      background: rgba(240,244,255,0.85);
    }
    .nav-container {
      max-width: 1200px; margin: 0 auto;
      padding: 0 24px;
      display: flex; align-items: center; justify-content: space-between;
    }
    .nav-logo {
      font-size: 1.5rem; font-weight: 800;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .nav-links {
      display: flex; gap: 8px; align-items: center;
    }
    .nav-links a {
      padding: 8px 14px; border-radius: 8px;
      font-size: 0.875rem; font-weight: 500;
      color: var(--text-muted);
      transition: var(--transition);
    }
    .nav-links a:hover, .nav-links a.active {
      color: var(--accent); background: var(--glass);
    }
    .nav-right { display: flex; align-items: center; gap: 12px; }
    .theme-toggle {
      background: var(--glass); border: 1px solid var(--glass-border);
      border-radius: 50%; width: 38px; height: 38px;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; color: var(--text); font-size: 0.9rem;
      transition: var(--transition);
    }
    .theme-toggle:hover { background: var(--primary); color: white; }
    .nav-cta {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white !important; padding: 8px 20px !important;
      border-radius: 8px !important; font-weight: 600 !important;
    }
    .nav-cta:hover { opacity: 0.9; background: var(--glass) !important; }
    .hamburger {
      display: none; flex-direction: column; gap: 5px;
      cursor: pointer; background: none; border: none;
      padding: 4px;
    }
    .hamburger span {
      display: block; width: 24px; height: 2px;
      background: var(--text); border-radius: 2px;
      transition: var(--transition);
    }
    .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
    .hamburger.open span:nth-child(2) { opacity: 0; }
    .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

    /* Mobile Nav */
    .mobile-nav {
      display: none; position: fixed; top: 70px; left: 0; right: 0;
      background: rgba(15,23,42,0.97); backdrop-filter: blur(20px);
      padding: 20px 24px; z-index: 999;
      flex-direction: column; gap: 4px;
      border-bottom: 1px solid var(--glass-border);
    }
    [data-theme="light"] .mobile-nav { background: rgba(240,244,255,0.97); }
    .mobile-nav.open { display: flex; }
    .mobile-nav a { padding: 12px 16px; border-radius: 8px; color: var(--text-muted); font-size: 0.95rem; font-weight: 500; }
    .mobile-nav a:hover { background: var(--glass); color: var(--accent); }

    /* ===== CONTAINER ===== */
    .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

    /* ===== SECTION HEADER ===== */
    .section-header { text-align: center; margin-bottom: 60px; }
    .section-eyebrow {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 0.8rem; font-weight: 600; letter-spacing: 0.15em;
      text-transform: uppercase; color: var(--accent);
      background: rgba(56,189,248,0.1);
      border: 1px solid rgba(56,189,248,0.2);
      padding: 6px 16px; border-radius: 99px;
      margin-bottom: 16px;
    }
    .section-title {
      font-size: clamp(1.8rem, 4vw, 2.8rem);
      font-weight: 800; line-height: 1.2;
      margin-bottom: 16px;
    }
    .section-title span {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .section-subtitle { color: var(--text-muted); max-width: 560px; margin: 0 auto; font-size: 1.05rem; }

    /* ===== GLASS CARD ===== */
    .glass-card {
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius);
      transition: var(--transition);
    }
    .glass-card:hover { border-color: rgba(56,189,248,0.3); transform: translateY(-4px); box-shadow: 0 20px 40px rgba(37,99,235,0.15); }

    /* ===== BUTTONS ===== */
    .btn {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 13px 28px; border-radius: 10px;
      font-family: 'Poppins', sans-serif; font-size: 0.9rem; font-weight: 600;
      cursor: pointer; border: none; transition: var(--transition);
      text-decoration: none;
    }
    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white; box-shadow: 0 8px 24px rgba(37,99,235,0.35);
    }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(37,99,235,0.5); }
    .btn-outline {
      background: var(--glass); border: 1px solid var(--glass-border);
      color: var(--text); backdrop-filter: blur(8px);
    }
    .btn-outline:hover { border-color: var(--accent); color: var(--accent); background: rgba(56,189,248,0.08); }

    /* ===== HERO ===== */
    #hero {
      min-height: 100vh;
      display: flex; align-items: center;
      padding: 100px 0 60px;
      position: relative; overflow: hidden;
    }
    .hero-bg {
      position: absolute; inset: 0; pointer-events: none;
    }
    .hero-orb {
      position: absolute; border-radius: 50%;
      filter: blur(80px); opacity: 0.2;
    }
    .orb1 { width: 600px; height: 600px; background: var(--primary); top: -200px; right: -150px; }
    .orb2 { width: 400px; height: 400px; background: var(--accent); bottom: -100px; left: -100px; }
    .orb3 { width: 300px; height: 300px; background: var(--accent2); top: 40%; left: 40%; }
    .hero-grid {
      display: grid; grid-template-columns: 1fr 1fr;
      align-items: center; gap: 60px;
      position: relative;
    }
    .hero-content { position: relative; }
    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(56,189,248,0.1); border: 1px solid rgba(56,189,248,0.25);
      border-radius: 99px; padding: 8px 18px;
      font-size: 0.8rem; font-weight: 600; color: var(--accent);
      margin-bottom: 24px;
      letter-spacing: 0.05em;
    }
    .hero-badge .dot { width: 8px; height: 8px; background: #22C55E; border-radius: 50%; animation: blink 1.5s ease-in-out infinite; }
    @keyframes blink { 0%,100% { opacity: 1; } 50% { opacity: 0; } }
    .hero-name {
      font-size: clamp(2.5rem, 6vw, 4rem);
      font-weight: 900; line-height: 1.1;
      margin-bottom: 12px;
    }
    .hero-name .highlight {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .hero-role {
      font-size: 1.1rem; color: var(--text-muted);
      margin-bottom: 20px; font-weight: 500;
      min-height: 30px;
    }
    .typed-cursor { color: var(--accent); animation: blink 0.7s step-end infinite; }
    .hero-desc { color: var(--text-muted); margin-bottom: 32px; max-width: 480px; line-height: 1.7; }
    .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
    .hero-stats {
      display: flex; gap: 32px; margin-top: 48px;
    }
    .stat-item { text-align: left; }
    .stat-num {
      font-size: 1.8rem; font-weight: 800;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .stat-label { font-size: 0.8rem; color: var(--text-dim); font-weight: 500; }

    /* Hero Visual */
    .hero-visual { display: flex; justify-content: center; align-items: center; position: relative; }
    .hero-avatar-wrap {
      position: relative; width: 340px; height: 340px;
    }
    .avatar-ring {
      position: absolute; inset: -12px;
      border-radius: 50%; padding: 3px;
      background: linear-gradient(135deg, var(--primary), var(--accent), var(--accent2));
      animation: spinSlow 8s linear infinite;
    }
    @keyframes spinSlow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    .avatar-ring-inner { width: 100%; height: 100%; background: var(--bg); border-radius: 50%; }
    .avatar-img {
      position: relative; width: 100%; height: 100%;
      border-radius: 50%; overflow: hidden;
      background: linear-gradient(135deg, var(--bg2), var(--primary));
      display: flex; align-items: center; justify-content: center;
      font-size: 6rem; color: rgba(255,255,255,0.2);
      z-index: 1;
    }
    .avatar-img img { width: 100%; height: 100%; object-fit: cover; }
    .floating-badge {
      position: absolute; background: var(--card-bg);
      backdrop-filter: blur(16px); border: 1px solid var(--glass-border);
      border-radius: 12px; padding: 10px 16px;
      display: flex; align-items: center; gap: 10px;
      font-size: 0.8rem; font-weight: 600;
      box-shadow: var(--shadow);
      animation: float 3s ease-in-out infinite;
    }
    .floating-badge .icon { font-size: 1.2rem; }
    .badge-top-right { top: 20px; right: -30px; animation-delay: 0s; }
    .badge-bottom-left { bottom: 40px; left: -40px; animation-delay: 1s; }
    .badge-top-left { top: 60px; left: -20px; animation-delay: 2s; }
    @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

    /* ===== ABOUT ===== */
    #about { background: var(--bg2); }
    .about-grid { display: grid; grid-template-columns: 1fr 1.3fr; gap: 60px; align-items: start; }
    .about-img-wrap { position: relative; }
    .about-img {
      width: 100%; aspect-ratio: 4/5;
      border-radius: 24px; overflow: hidden;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      display: flex; align-items: center; justify-content: center;
      font-size: 8rem; color: rgba(255,255,255,0.15);
    }
    .about-img img { width: 100%; height: 100%; object-fit: cover; }
    .about-exp-card {
      position: absolute; bottom: 30px; right: -20px;
      background: var(--card-bg); backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border); border-radius: 16px;
      padding: 20px 24px; text-align: center; min-width: 140px;
      box-shadow: var(--shadow);
    }
    .exp-num { font-size: 2.5rem; font-weight: 900; color: var(--accent); line-height: 1; }
    .exp-label { font-size: 0.75rem; color: var(--text-muted); margin-top: 4px; }
    .about-text { }
    .about-desc { color: var(--text-muted); margin-bottom: 24px; line-height: 1.8; }
    .about-info {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 14px; margin-bottom: 32px;
    }
    .info-item { display: flex; flex-direction: column; gap: 2px; }
    .info-label { font-size: 0.75rem; color: var(--text-dim); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; }
    .info-value { font-size: 0.9rem; font-weight: 600; color: var(--text); }
    .info-value a { color: var(--accent); }

    /* Timeline */
    .timeline { position: relative; padding-left: 24px; }
    .timeline::before {
      content: ''; position: absolute; left: 8px; top: 0; bottom: 0;
      width: 2px; background: linear-gradient(to bottom, var(--primary), var(--accent));
      border-radius: 2px;
    }
    .timeline-item { position: relative; margin-bottom: 28px; }
    .timeline-item::before {
      content: ''; position: absolute; left: -20px; top: 6px;
      width: 12px; height: 12px; border-radius: 50%;
      background: var(--accent); border: 3px solid var(--bg2);
      box-shadow: 0 0 0 3px rgba(56,189,248,0.3);
    }
    .timeline-date { font-size: 0.75rem; font-weight: 600; color: var(--accent); margin-bottom: 4px; }
    .timeline-title { font-size: 0.95rem; font-weight: 700; margin-bottom: 2px; }
    .timeline-sub { font-size: 0.82rem; color: var(--text-muted); }

    /* ===== SKILLS ===== */
    #skills { }
    .skills-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}
    .skill-category-card {
      padding: 28px;
    }
    .skill-cat-header { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; }
    .skill-cat-icon {
      width: 44px; height: 44px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.1rem;
    }
    .icon-frontend { background: rgba(37,99,235,0.15); color: var(--primary-light); }
    .icon-backend { background: rgba(56,189,248,0.1); color: var(--accent); }
    .icon-database { background: rgba(129,140,248,0.15); color: var(--accent2); }
    .icon-tools { background: rgba(34,197,94,0.1); color: #22C55E; }
    .skill-cat-name { font-size: 1rem; font-weight: 700; }
    .skill-item { margin-bottom: 16px; }
    .skill-header { display: flex; justify-content: space-between; margin-bottom: 6px; }
    .skill-name { font-size: 0.85rem; font-weight: 600; }
    .skill-pct { font-size: 0.8rem; color: var(--text-muted); }
    .skill-bar { height: 6px; background: var(--glass); border-radius: 99px; overflow: hidden; }
    .skill-fill {
      height: 100%; border-radius: 99px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      width: 0; transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ===== SERVICES ===== */
    #services { background: var(--bg2); }
    .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; }
    .service-card { padding: 32px 28px; position: relative; overflow: hidden; }
    .service-card::before {
      content: ''; position: absolute; top: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      opacity: 0; transition: var(--transition);
    }
    .service-card:hover::before { opacity: 1; }
    .service-icon {
      width: 56px; height: 56px; border-radius: 14px;
      background: linear-gradient(135deg, rgba(37,99,235,0.15), rgba(56,189,248,0.1));
      border: 1px solid rgba(56,189,248,0.2);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem; color: var(--accent);
      margin-bottom: 20px; transition: var(--transition);
    }
    .service-card:hover .service-icon {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white; border-color: transparent;
      transform: scale(1.05);
    }
    .service-title { font-size: 1.05rem; font-weight: 700; margin-bottom: 10px; }
    .service-desc { font-size: 0.85rem; color: var(--text-muted); line-height: 1.7; }
    .service-num {
      position: absolute; bottom: 20px; right: 24px;
      font-size: 3.5rem; font-weight: 900;
      color: var(--glass-border); line-height: 1;
      transition: var(--transition);
    }
    .service-card:hover .service-num { color: rgba(56,189,248,0.08); }

    /* ===== PORTFOLIO ===== */
    #portfolio { }
    .portfolio-filter {
      display: flex; gap: 10px; justify-content: center;
      flex-wrap: wrap; margin-bottom: 40px;
    }
    .filter-btn {
      padding: 8px 20px; border-radius: 99px;
      border: 1px solid var(--glass-border);
      background: var(--glass); color: var(--text-muted);
      font-family: 'Poppins', sans-serif; font-size: 0.85rem; font-weight: 500;
      cursor: pointer; transition: var(--transition);
    }
    .filter-btn:hover, .filter-btn.active {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white; border-color: transparent;
      box-shadow: 0 4px 16px rgba(37,99,235,0.35);
    }
    .portfolio-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 28px; }
    .project-card {
      overflow: hidden;
      transition: var(--transition);
    }
    .project-card.hidden { display: none; }
    .project-preview {
      height: 200px; position: relative; overflow: hidden;
      background: linear-gradient(135deg, var(--bg2), var(--bg3));
    }
    .project-preview-inner {
      width: 100%; height: 100%;
      display: flex; align-items: center; justify-content: center;
      font-size: 4rem; position: relative;
      transition: transform 0.4s ease;
    }
    .project-card:hover .project-preview-inner { transform: scale(1.05); }
    .project-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(15,23,42,0.95), transparent);
      display: flex; align-items: flex-end;
      padding: 20px; gap: 10px;
      opacity: 0; transition: var(--transition);
    }
    .project-card:hover .project-overlay { opacity: 1; }
    .project-overlay a {
      padding: 8px 16px; border-radius: 8px; font-size: 0.8rem; font-weight: 600;
      display: flex; align-items: center; gap: 6px;
      transition: var(--transition);
    }
    .btn-demo { background: var(--primary); color: white; }
    .btn-github { background: var(--glass); border: 1px solid var(--glass-border); color: var(--text); backdrop-filter: blur(8px); }
    .btn-demo:hover { background: var(--primary-light); }
    .btn-github:hover { border-color: var(--accent); color: var(--accent); }
    .project-content { padding: 24px; }
    .project-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 12px; }
    .tag {
      padding: 4px 10px; border-radius: 99px;
      font-size: 0.72rem; font-weight: 600;
      background: rgba(37,99,235,0.12);
      border: 1px solid rgba(37,99,235,0.2);
      color: var(--accent);
    }
    .project-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 8px; }
    .project-desc { font-size: 0.85rem; color: var(--text-muted); line-height: 1.65; }

    /* ===== CONTACT ===== */
#contact {
    background: var(--bg2);
    padding-top: 60px
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
    margin-top: 40px;
}

.contact-info-card,
.contact-form-card {
    padding: 40px;
    height: 100%;
}

.contact-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 12px;
}

.contact-subtitle {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.8;
    margin-bottom: 32px;
}

.contact-list {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 16px;
}

.contact-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    background: rgba(37,99,235,0.1);
    border: 1px solid rgba(37,99,235,0.2);

    display: flex;
    align-items: center;
    justify-content: center;

    color: var(--accent);
    font-size: 1.2rem;
    flex-shrink: 0;
}

.contact-item-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--text-dim);
    text-transform: uppercase;
    letter-spacing: 0.08em;
}

.contact-item-value {
    font-size: 1rem;
    font-weight: 600;
    margin-top: 4px;
}

/* ===== FORM ===== */

.form-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 32px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    margin-bottom: 8px;

    font-size: 0.8rem;
    font-weight: 600;

    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.form-input,
.form-textarea {
    width: 100%;
    box-sizing: border-box;

    padding: 14px 16px;

    border-radius: 12px;
    border: 1px solid var(--glass-border);

    background: var(--glass);
    color: var(--text);

    font-size: 0.95rem;
    font-family: 'Poppins', sans-serif;

    outline: none;
    transition: var(--transition);
}

.form-input:focus,
.form-textarea:focus {
    border-color: var(--primary);
    background: rgba(37,99,235,0.05);
    box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: var(--text-dim);
}

.form-textarea {
    min-height: 150px;
    resize: vertical;
}

.form-success {
    display: none;
    margin-top: 16px;
    padding: 14px 18px;

    border-radius: 10px;
    border: 1px solid rgba(34,197,94,0.25);

    background: rgba(34,197,94,0.1);
    color: #22C55E;

    font-size: 0.9rem;
    font-weight: 600;
}

.form-success.show {
    display: block;
}


    /* ===== FOOTER ===== */
    footer {
      background: var(--bg3); border-top: 1px solid var(--glass-border);
      padding: 60px 0 0;
    }
    .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 48px; margin-bottom: 48px; }
    .footer-brand .nav-logo { font-size: 1.6rem; display: block; margin-bottom: 14px; }
    .footer-desc { color: var(--text-muted); font-size: 0.88rem; line-height: 1.75; max-width: 300px; margin-bottom: 20px; }
    .footer-socials { display: flex; gap: 10px; }
    .footer-title { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-dim); margin-bottom: 18px; }
    .footer-links { display: flex; flex-direction: column; gap: 10px; }
    .footer-links a { font-size: 0.88rem; color: var(--text-muted); transition: var(--transition); display: flex; align-items: center; gap: 8px; }
    .footer-links a:hover { color: var(--accent); padding-left: 4px; }
    .footer-links a::before { content: '→'; font-size: 0.75rem; opacity: 0; transition: var(--transition); }
    .footer-links a:hover::before { opacity: 1; }
    .footer-bottom {
      border-top: 1px solid var(--glass-border);
      padding: 20px 0; display: flex;
      justify-content: space-between; align-items: center;
      flex-wrap: wrap; gap: 12px;
    }
    .footer-copy { font-size: 0.82rem; color: var(--text-dim); }
    .footer-copy span { color: var(--accent); }
    #back-to-top {
      position: fixed; bottom: 28px; right: 28px;
      width: 44px; height: 44px; border-radius: 12px;
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white; display: none; align-items: center; justify-content: center;
      font-size: 1rem; cursor: pointer; border: none;
      box-shadow: 0 8px 24px rgba(37,99,235,0.4);
      transition: var(--transition); z-index: 100;
    }
    #back-to-top.show { display: flex; }
    #back-to-top:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(37,99,235,0.5); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .hero-grid { grid-template-columns: 1fr; text-align: center; gap: 48px; }
      .hero-desc { margin: 0 auto 32px; }
      .hero-btns { justify-content: center; }
      .hero-stats { justify-content: center; }
      .hero-visual { order: -1; }
      .hero-avatar-wrap { width: 260px; height: 260px; }
      .about-grid { grid-template-columns: 1fr; }
      .about-img { aspect-ratio: 16/9; max-height: 280px; }
      .contact-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      section { padding: 70px 0; }
      .nav-links { display: none; }
      .nav-cta { display: none; }
      .hamburger { display: flex; }
      .hero-stats { flex-direction: column; gap: 20px; align-items: center; }
      .about-info { grid-template-columns: 1fr; }
      .form-row { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; }
      .footer-bottom { flex-direction: column; text-align: center; }
      .badge-top-left { display: none; }
    }
    @media (max-width: 480px) {
      .portfolio-grid { grid-template-columns: 1fr; }
      .services-grid { grid-template-columns: 1fr; }
    }
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
    }
  </style>
</head>
<body>

<!-- ===== LOADER ===== -->

<!-- ===== NAVBAR ===== -->
<nav id="navbar">
  <div class="nav-container">
    <a href="#hero" class="nav-logo">&lt;Dev Rava/&gt;</a>
    <ul class="nav-links">
      <li><a href="#hero" class="active">Beranda</a></li>
      <li><a href="#about">Tentang</a></li>
      <li><a href="#skills">Keahlian</a></li>
      <li><a href="#services">Layanan</a></li>
      <li><a href="#portfolio">Portofolio</a></li>
      <li><a href="#contact" class="nav-cta">Hubungi Saya</a></li>
    </ul>
    <div class="nav-right">
      <button class="theme-toggle" id="themeToggle" title="Toggle tema"><i class="fas fa-moon"></i></button>
      <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</nav>
<div class="mobile-nav" id="mobileNav">
  <a href="#hero">Beranda</a>
  <a href="#about">Tentang</a>
  <a href="#skills">Keahlian</a>
  <a href="#services">Layanan</a>
  <a href="#portfolio">Portofolio</a>
  <a href="#contact">Hubungi Saya</a>
</div>

<!-- ===== HERO ===== -->
<section id="hero">
  <div class="hero-bg">
    <div class="hero-orb orb1"></div>
    <div class="hero-orb orb2"></div>
    <div class="hero-orb orb3"></div>
  </div>
  <div class="container">
    <div class="hero-grid">
      <div class="hero-content" data-aos="fade-right" data-aos-duration="800">
        
        <h1 class="hero-name">
          Halo, Saya<br><span class="highlight">Ravanello</span>
        </h1>
        <p class="hero-role"><span id="typed"></span><span class="typed-cursor">|</span></p>
        <p class="hero-desc">
          Mahasiswa D3 Teknologi Informasi dengan semangat tinggi dalam membangun solusi digital yang inovatif, estetis, dan berdampak. Saya mengubah ide menjadi pengalaman web yang luar biasa.
        </p>
        <div class="hero-btns">
          <a href="assets/CV.pdf" download class="btn btn-primary">
    <i class="fas fa-download"></i> Unduh CV
</a>
          <a href="#contact" class="btn btn-outline"><i class="fas fa-paper-plane"></i> Hubungi Saya</a>
        </div>
        <div class="hero-stats">
          <div class="stat-item">
            <div class="stat-num">10+</div>
            <div class="stat-label">Proyek Selesai</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">3.73</div>
            <div class="stat-label">IPK Saat Ini</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">5+</div>
            <div class="stat-label">Teknologi Dikuasai</div>
          </div>
        </div>
      </div>
      <div class="hero-visual" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
        <div class="hero-avatar-wrap">
          <div class="avatar-ring"><div class="avatar-ring-inner"></div></div>
          <div class="avatar-img">
            <img src="{{ asset('assets/images/profile.jpeg') }}">
          </div>
          <div class="floating-badge badge-top-right">
            <span class="icon">⚡</span>
            <div>
              <div style="font-size:0.7rem;color:var(--text-dim)">SPESIALISASI</div>
              <div>Laravel & PHP</div>
            </div>
          </div>
          <div class="floating-badge badge-bottom-left">
            <span class="icon">🎨</span>
            <div>
              <div style="font-size:0.7rem;color:var(--text-dim)">DESAIN</div>
              <div>UI/UX Modern</div>
            </div>
          </div>
          <div class="floating-badge badge-top-left">
            <span class="icon">🎓</span>
            <div>
              <div style="font-size:0.7rem;color:var(--text-dim)">PENDIDIKAN</div>
              <div>D3 Teknologi Informasi</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== ABOUT ===== -->
<section id="about">
  <div class="container">
    <div class="about-grid">
      
      </div>
      <div data-aos="fade-left" data-aos-delay="100">
        <div class="section-eyebrow"><i class="fas fa-user"></i> Tentang Saya</div>
        <h2 class="section-title" style="text-align:left;margin-bottom:16px">
          Passionate <span>Web Developer</span> & IT Student
        </h2>
        <p class="about-desc">
          Saya adalah mahasiswa D3 Teknologi Informasi yang bersemangat dalam mengembangkan solusi berbasis web. Dengan keahlian di bidang pengembangan front-end maupun back-end, saya berkomitmen untuk menghasilkan produk digital yang fungsional, estetis, dan berorientasi pengguna.
        </p>
        <p class="about-desc" style="margin-bottom:28px">
          Minat saya mencakup pengembangan sistem informasi, desain UI/UX, dan eksplorasi teknologi digital terbaru. Saya percaya bahwa teknologi yang baik harus mampu memecahkan masalah nyata dan memberikan pengalaman yang menyenangkan bagi penggunanya.
        </p>
        <div class="about-info">
          <div class="info-item">
            <span class="info-label">Nama</span>
            <span class="info-value">Ravanello Braima Nugrantoro</span>
          </div>
          <div class="info-item">
            <span class="info-label">Program Studi</span>
            <span class="info-value">D3 Teknologi Informasi</span>
          </div>
          <div class="info-item">
            <span class="info-label">IPK</span>
            <span class="info-value">3.73 / 4.00</span>
          </div>
          <div class="info-item">
            <span class="info-label">Email</span>
            <span class="info-value"><a href="mailto:ravanello2626@gmail.com">ravanello2626@gmail.com</a></span>
          </div>
          <div class="info-item">
            <span class="info-label">Lokasi</span>
            <span class="info-value">Malang, Indonesia</span>
          </div>
        </div>

        <div style="margin-bottom:28px">
          <h3 style="font-size:0.9rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--text-dim);margin-bottom:20px">Perjalanan Saya</h3>
          <div class="timeline">
            <div class="timeline-item">
              <div class="timeline-date">2024 — Sekarang</div>
              <div class="timeline-title">Universitas Brawijaya</div>
              <div class="timeline-sub">D3 Teknologi Informasi</div>
            </div>
            <div class="timeline-item">
              <div class="timeline-date">2021 — 2024</div>
              <div class="timeline-title">SMA Negeri 1 Talun</div>
              <div class="timeline-sub">Jurusan Ilmu Pengetahuan Alam</div>
            </div>
          </div>
        </div>

        <a href="#contact" class="btn btn-primary"><i class="fas fa-handshake"></i> Ajak Kolaborasi</a>
      </div>
    </div>
  </div>
</section>

<!-- ===== SKILLS ===== -->
<section id="skills">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <div class="section-eyebrow"><i class="fas fa-code"></i> Keahlian</div>
      <h2 class="section-title">Tech <span>Stack</span> Saya</h2>
      <p class="section-subtitle">Teknologi dan alat yang saya gunakan untuk membangun produk digital berkualitas tinggi</p>
    </div>
    <div class="skills-grid">

    <div class="glass-card skill-category-card">
        <div class="skill-cat-header">
            <div class="skill-cat-icon icon-frontend">
                <i class="fas fa-palette"></i>
            </div>
            <span class="skill-cat-name">Frontend</span>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <span class="tag">HTML</span>
            <span class="tag">CSS</span>
            <span class="tag">JavaScript</span>
            <span class="tag">Bootstrap</span>
            <span class="tag">Tailwind CSS</span>
        </div>
    </div>

    <div class="glass-card skill-category-card">
        <div class="skill-cat-header">
            <div class="skill-cat-icon icon-backend">
                <i class="fas fa-server"></i>
            </div>
            <span class="skill-cat-name">Backend</span>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <span class="tag">PHP</span>
            <span class="tag">Laravel</span>
            <span class="tag">REST API</span>
        </div>
    </div>

    <div class="glass-card skill-category-card">
        <div class="skill-cat-header">
            <div class="skill-cat-icon icon-database">
                <i class="fas fa-database"></i>
            </div>
            <span class="skill-cat-name">Database</span>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <span class="tag">MySQL</span>
            <span class="tag">Firebase</span>
        </div>
    </div>

    <div class="glass-card skill-category-card">
        <div class="skill-cat-header">
            <div class="skill-cat-icon icon-tools">
                <i class="fas fa-tools"></i>
            </div>
            <span class="skill-cat-name">Tools</span>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <span class="tag">Git</span>
            <span class="tag">GitHub</span>
            <span class="tag">Figma</span>
            <span class="tag">VS Code</span>
        </div>
    </div>

</div>
      </div>
    </div>
  </div>
</section>

<!-- ===== SERVICES ===== -->
<section id="services">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <div class="section-eyebrow"><i class="fas fa-briefcase"></i> Layanan</div>
      <h2 class="section-title">Apa yang Bisa <span>Saya Bantu</span>?</h2>
      <p class="section-subtitle">Saya menawarkan berbagai layanan pengembangan web dan solusi teknologi informasi yang profesional</p>
    </div>
    <div class="services-grid">
      <div class="glass-card service-card" data-aos="fade-up" data-aos-delay="0">
        <div class="service-icon"><i class="fas fa-globe"></i></div>
        <h3 class="service-title">Website Development</h3>
        <p class="service-desc">Membangun website modern, responsif, dan berperforma tinggi sesuai kebutuhan bisnis Anda menggunakan teknologi terkini.</p>
        <div class="service-num">01</div>
      </div>
      <div class="glass-card service-card" data-aos="fade-up" data-aos-delay="80">
        <div class="service-icon"><i class="fas fa-cogs"></i></div>
        <h3 class="service-title">Sistem Informasi</h3>
        <p class="service-desc">Merancang dan mengembangkan sistem informasi terintegrasi yang membantu manajemen data dan proses bisnis lebih efisien.</p>
        <div class="service-num">02</div>
      </div>
      <div class="glass-card service-card" data-aos="fade-up" data-aos-delay="160">
        <div class="service-icon"><i class="fas fa-paint-brush"></i></div>
        <h3 class="service-title">UI/UX Design</h3>
        <p class="service-desc">Mendesain antarmuka yang intuitif, estetis, dan berpusat pada pengguna untuk meningkatkan pengalaman dan konversi produk digital Anda.</p>
        <div class="service-num">03</div>
      </div>
      <div class="glass-card service-card" data-aos="fade-up" data-aos-delay="240">
        <div class="service-icon"><i class="fas fa-database"></i></div>
        <h3 class="service-title">Database Management</h3>
        <p class="service-desc">Perancangan struktur database yang optimal, efisien, dan aman untuk mendukung performa aplikasi Anda dalam jangka panjang.</p>
        <div class="service-num">04</div>
      </div>
      <div class="glass-card service-card" data-aos="fade-up" data-aos-delay="320">
        <div class="service-icon"><i class="fas fa-tools"></i></div>
        <h3 class="service-title">Website Maintenance</h3>
        <p class="service-desc">Layanan pemeliharaan dan pembaruan website secara berkala agar selalu berjalan optimal, aman, dan up-to-date.</p>
        <div class="service-num">05</div>
      </div>
      <div class="glass-card service-card" data-aos="fade-up" data-aos-delay="400">
        <div class="service-icon"><i class="fas fa-mobile-alt"></i></div>
        <h3 class="service-title">Responsive Web Design</h3>
        <p class="service-desc">Memastikan website Anda tampil sempurna di semua perangkat — desktop, tablet, maupun smartphone — dengan teknik desain responsif terbaik.</p>
        <div class="service-num">06</div>
      </div>
    </div>
  </div>
</section>

<!-- ===== PORTFOLIO ===== -->
<section id="portfolio">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <div class="section-eyebrow"><i class="fas fa-folder-open"></i> Portofolio</div>
      <h2 class="section-title">Proyek <span>Terbaru</span> Saya</h2>
      <p class="section-subtitle">Koleksi proyek yang menunjukkan kemampuan teknis dan kreativitas saya dalam pengembangan web</p>
    </div>
    <div class="portfolio-filter" data-aos="fade-up" data-aos-delay="100">
      <button class="filter-btn active" data-filter="all">Semua</button>
      <button class="filter-btn" data-filter="web">Web App</button>
      <button class="filter-btn" data-filter="mobile">Mobile App</button>
      <button class="filter-btn" data-filter="iot">IoT System</button>
    </div>
    <div class="portfolio-grid">
        
<div class="glass-card project-card" data-tags="web" data-aos="fade-up" data-aos-delay="100">
  <div class="project-preview">
    <div class="project-preview-inner" style="background:linear-gradient(135deg,#7C3AED,#A855F7,#EC4899)">
      <span>🎮</span>
    </div>
    <div class="project-overlay">
      <a href="#" class="btn-demo"><i class="fas fa-external-link-alt"></i> Demo</a>
      <a href="#" class="btn-github"><i class="fab fa-github"></i> GitHub</a>
    </div>
  </div>

  <div class="project-content">
    <div class="project-tags">
      <span class="tag">Laravel</span>
      <span class="tag">PHP</span>
      <span class="tag">MySQL</span>
      <span class="tag">JavaScript</span>
    </div>

    <h3 class="project-title">Website Game Pembelajaran</h3>

    <p class="project-desc">
      Platform game edukasi berbasis web yang menggabungkan materi pembelajaran
      dengan tantangan interaktif. Dilengkapi fitur sistem poin, leaderboard,
      progress pengguna, serta evaluasi hasil belajar untuk meningkatkan
      keterlibatan dan pemahaman pengguna.
    </p>
  </div>
</div>

      <div class="glass-card project-card" data-tags="web" data-aos="fade-up" data-aos-delay="0">
        <div class="project-preview">
          <div class="project-preview-inner" style="background:linear-gradient(135deg,#1E3A5F,#2563EB,#0EA5E9)">
            <span>🍜</span>
          </div>
          <div class="project-overlay">
            <a href="#" class="btn-demo"><i class="fas fa-external-link-alt"></i> Demo</a>
            <a href="#" class="btn-github"><i class="fab fa-github"></i> GitHub</a>
          </div>
        </div>
        <div class="project-content">
          <div class="project-tags">
            <span class="tag">Laravel</span>
            <span class="tag">MySQL</span>
            <span class="tag">Bootstrap</span>
          </div>
          <h3 class="project-title">Warmindo Sobo</h3>
          <p class="project-desc">Website pemesanan makanan online dengan fitur pemesanan real-time, keranjang belanja dinamis, manajemen menu, dan dashboard admin yang komprehensif.</p>
        </div>
      </div>

      <div class="glass-card project-card" data-tags="web" data-aos="fade-up" data-aos-delay="100">
        <div class="project-preview">
          <div class="project-preview-inner" style="background:linear-gradient(135deg,#1A1A2E,#16213E,#0F3460)">
            <span>🥋</span>
          </div>
          <div class="project-overlay">
            <a href="#" class="btn-demo"><i class="fas fa-external-link-alt"></i> Demo</a>
            <a href="#" class="btn-github"><i class="fab fa-github"></i> GitHub</a>
          </div>
        </div>
        <div class="project-content">
          <div class="project-tags">
            <span class="tag">PHP</span>
            <span class="tag">JavaScript</span>
            <span class="tag">MySQL</span>
          </div>
          <h3 class="project-title">Sistem Perhitungan Skor Pencak Silat</h3>
          <p class="project-desc">Sistem penilaian pertandingan pencak silat berbasis web dengan input skor multi-juri, perhitungan otomatis real-time, dan laporan hasil pertandingan.</p>
        </div>
      </div>

      <div class="glass-card project-card" data-tags="web" data-aos="fade-up" data-aos-delay="200">
        <div class="project-preview">
          <div class="project-preview-inner" style="background:linear-gradient(135deg,#064E3B,#065F46,#0D9488)">
            <span>🌿</span>
          </div>
          <div class="project-overlay">
            <a href="#" class="btn-demo"><i class="fas fa-external-link-alt"></i> Demo</a>
            <a href="#" class="btn-github"><i class="fab fa-github"></i> GitHub</a>
          </div>
        </div>
        <div class="project-content">
          <div class="project-tags">
            <span class="tag">Laravel</span>
            <span class="tag">Bootstrap</span>
            <span class="tag">MySQL</span>
          </div>
          <h3 class="project-title">Bangun Hidup Sehat</h3>
          <p class="project-desc">Platform edukasi kesehatan berbasis web dengan modul pembelajaran interaktif, tracking aktivitas pengguna, dan sistem progress pencapaian kesehatan.</p>
        </div>
      </div>

      <div class="glass-card project-card" data-tags="iot">

    <div class="project-preview">
        <div class="project-preview-inner"
             style="background:linear-gradient(135deg,#0F172A,#0EA5E9,#38BDF8)">
            <span>⚡</span>
        </div>
    </div>

    <div class="project-content">

        <div class="project-tags">
            <span class="tag">ESP32</span>
            <span class="tag">MQTT</span>
            <span class="tag">IoT</span>
            <span class="tag">Cloud</span>
        </div>

        <h3 class="project-title">
            Smart Energy Monitoring System
        </h3>

        <p class="project-desc">
            Sistem monitoring energi berbasis IoT menggunakan sensor
            piezoelectric, ESP32, MQTT dan dashboard cloud untuk memantau
            produksi energi secara real-time.
        </p>

    </div>
</div>

<div class="glass-card project-card" data-tags="mobile">

    <div class="project-preview">
        <div class="project-preview-inner"
             style="background:linear-gradient(135deg,#7C3AED,#9333EA,#C084FC)">
            <span>📱</span>
        </div>
    </div>

    <div class="project-content">

        <div class="project-tags">
            <span class="tag">Android</span>
            <span class="tag">Mobile App</span>
        </div>

        <h3 class="project-title">
            Mobile Application Project
        </h3>

        <p class="project-desc">
            Aplikasi mobile berbasis Android yang dikembangkan untuk
            mendukung kebutuhan digital dan otomasi pengguna.
        </p>

    </div>
</div>

    </div>
  </div>
</section>

<!-- ===== CONTACT ===== -->
<section id="contact">
  <div class="container">
    <section id="contact">
    <div class="container">

    <div class="section-header" data-aos="fade-up">
        <div class="section-eyebrow">
            <i class="fas fa-envelope"></i> Kontak
        </div>

        <h2 class="section-title">
            Mari <span>Berkolaborasi!</span>
        </h2>

        <p class="section-subtitle">
            Punya proyek menarik atau ingin berdiskusi?
            Saya selalu terbuka untuk peluang baru.
        </p>
    </div>

    <div class="contact-grid">

        <!-- Informasi Kontak -->
        <div data-aos="fade-right">
            <div class="glass-card contact-info-card">

                <h3 class="contact-title">Informasi Kontak</h3>

                <p class="contact-subtitle">
                    Jangan ragu untuk menghubungi saya melalui salah satu
                    saluran berikut. Saya biasanya merespons dalam 24 jam.
                </p>

                <div class="contact-list">

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div>
                            <div class="contact-item-label">Email</div>
                            <div class="contact-item-value">
                                ravanello2626@gmail.com
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div>
                            <div class="contact-item-label">
                                Nomor Telepon
                            </div>
                            <div class="contact-item-value">
                                +62 85748746920
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Form Pesan -->
        <div data-aos="fade-left" data-aos-delay="100">
            <div class="glass-card contact-form-card">

                <h3 class="form-title">Kirim Pesan</h3>

                <form>

                    <div class="form-row">

                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input
                                type="text"
                                class="form-input"
                                placeholder="Nama Anda">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-input"
                                placeholder="email@gmail.com">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="form-label">Subjek</label>
                        <input
                            type="text"
                            class="form-input"
                            placeholder="Subjek pesan">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pesan</label>
                        <textarea
                            class="form-textarea"
                            placeholder="Tulis pesan Anda..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <span class="nav-logo">&lt;Dev/&gt;</span>
        <p class="footer-desc">Membangun solusi digital yang inovatif dan berdampak. Web developer muda yang bersemangat menciptakan pengalaman terbaik untuk pengguna.</p>
        <div class="footer-socials">
          <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
          <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-btn"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
      <div>
        <div class="footer-title">Quick Links</div>
        <nav class="footer-links">
          <a href="#hero">Beranda</a>
          <a href="#about">Tentang Saya</a>
          <a href="#skills">Keahlian</a>
          <a href="#services">Layanan</a>
          <a href="#portfolio">Portofolio</a>
          <a href="#contact">Kontak</a>
        </nav>
      </div>
      <div>
        <div class="footer-title">Layanan</div>
        <nav class="footer-links">
          <a href="#services">Website Development</a>
          <a href="#services">Sistem Informasi</a>
          <a href="#services">UI/UX Design</a>
          <a href="#services">Database Management</a>
          <a href="#services">Web Maintenance</a>
        </nav>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-copy">© 2025 <span>Ravanello Braima Nugrantoro</span>. Dirancang & Dikembangkan dengan <span>♥</span> menggunakan HTML, CSS & JS</p>
      <p class="footer-copy" style="font-size:0.78rem">D3 Teknologi Informasi • Web Developer</p>
    </div>
  </div>
</footer>

<!-- Back to Top -->
<button id="back-to-top" title="Kembali ke atas"><i class="fas fa-arrow-up"></i></button>

<!-- ===== SCRIPTS ===== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  // ===== LOADER =====
  window.addEventListener('load', () => {
    setTimeout(() => {
      document.getElementById('loader').classList.add('hidden');
    }, 1800);
  });

  // ===== AOS INIT =====
  AOS.init({ duration: 700, easing: 'ease-out-cubic', once: true, offset: 60 });

  // ===== NAVBAR =====
  const navbar = document.getElementById('navbar');
  const navLinks = document.querySelectorAll('.nav-links a');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
    // Back to top
    document.getElementById('back-to-top').classList.toggle('show', window.scrollY > 400);
    // Active nav
    const sections = document.querySelectorAll('section');
    let current = '';
    sections.forEach(s => { if (window.scrollY >= s.offsetTop - 120) current = s.id; });
    navLinks.forEach(a => { a.classList.toggle('active', a.getAttribute('href') === '#' + current); });
  });

  // ===== HAMBURGER =====
  const hamburger = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobileNav');
  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    mobileNav.classList.toggle('open');
  });
  mobileNav.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => { hamburger.classList.remove('open'); mobileNav.classList.remove('open'); });
  });

  // ===== THEME TOGGLE =====
  const themeToggle = document.getElementById('themeToggle');
  const html = document.documentElement;
  themeToggle.addEventListener('click', () => {
    const isDark = html.dataset.theme === 'dark';
    html.dataset.theme = isDark ? 'light' : 'dark';
    themeToggle.innerHTML = isDark ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';
  });

  // ===== TYPING ANIMATION =====
  const roles = ['Web Developer', 'UI/UX Enthusiast', 'IT Student', 'Laravel Developer', 'Problem Solver'];
  let ri = 0, ci = 0, deleting = false;
  const typedEl = document.getElementById('typed');
  function type() {
    const current = roles[ri];
    if (deleting) {
      typedEl.textContent = current.slice(0, --ci);
      if (ci === 0) { deleting = false; ri = (ri + 1) % roles.length; setTimeout(type, 400); return; }
      setTimeout(type, 50);
    } else {
      typedEl.textContent = current.slice(0, ++ci);
      if (ci === current.length) { deleting = true; setTimeout(type, 2000); return; }
      setTimeout(type, 90);
    }
  }
  setTimeout(type, 800);

  // ===== SKILL BARS ANIMATION =====
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.querySelectorAll('.skill-fill').forEach(bar => {
          bar.style.width = bar.dataset.pct + '%';
        });
      }
    });
  }, { threshold: 0.2 });
  document.querySelectorAll('.skill-category-card').forEach(c => observer.observe(c));

  // ===== PORTFOLIO FILTER =====
  const filterBtns = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      projectCards.forEach(card => {
        const tags = card.dataset.tags || '';
        const show = filter === 'all' || tags.includes(filter);
        card.style.display = show ? '' : 'none';
        if (show) { card.classList.remove('hidden'); } else { card.classList.add('hidden'); }
      });
    });
  });

  // ===== CONTACT FORM VALIDATION =====
  const form = document.getElementById('contactForm');
  function validateField(id, errorId, msg) {
    const el = document.getElementById(id);
    const err = document.getElementById(errorId);
    if (!el.value.trim()) { err.textContent = msg; return false; }
    if (id === 'femail' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(el.value)) {
      err.textContent = 'Format email tidak valid.'; return false;
    }
    err.textContent = ''; return true;
  }
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const v1 = validateField('fname', 'fnameError', 'Nama wajib diisi.');
    const v2 = validateField('femail', 'femailError', 'Email wajib diisi.');
    const v3 = validateField('fsubject', 'fsubjectError', 'Subjek wajib diisi.');
    const v4 = validateField('fmessage', 'fmessageError', 'Pesan wajib diisi.');
    if (v1 && v2 && v3 && v4) {
      const btn = form.querySelector('button[type=submit]');
      btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
      btn.disabled = true;
      setTimeout(() => {
        form.reset();
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Pesan';
        btn.disabled = false;
        const s = document.getElementById('formSuccess');
        s.classList.add('show');
        setTimeout(() => s.classList.remove('show'), 5000);
      }, 1500);
    }
  });
  ['fname','femail','fsubject','fmessage'].forEach(id => {
    const errorId = id + 'Error';
    document.getElementById(id)?.addEventListener('input', () => {
      document.getElementById(errorId).textContent = '';
    });
  });

  // ===== BACK TO TOP =====
  document.getElementById('back-to-top').addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // ===== SMOOTH SCROLL NAV =====
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
</script>
</body>
</html>