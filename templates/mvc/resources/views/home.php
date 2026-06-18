<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nexphant' }}</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #040408;
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(192, 132, 252, 0.15), transparent 60%),
                radial-gradient(circle at 10% 10%, rgba(251, 146, 60, 0.05), transparent 40%),
                radial-gradient(circle at 90% 90%, rgba(99, 102, 241, 0.05), transparent 40%),
                linear-gradient(rgba(255, 255, 255, 0.003) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.003) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 100% 100%, 32px 32px, 32px 32px;
            color: #f8fafc;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .welcome-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            position: relative;
        }

        /* Holographic mascot styling */
        .mascot-container {
            width: 100%;
            max-width: 320px;
            aspect-ratio: 1.18;
            margin-bottom: 2rem;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nx-holographic-nexphant {
            width: 100%;
            height: auto;
            max-height: 100%;
            filter: drop-shadow(0 15px 30px rgba(192, 132, 252, 0.2));
            animation: mascot-float 6s ease-in-out infinite;
            transition: transform 0.4s ease-out;
        }

        .nx-holographic-nexphant:hover {
            transform: scale(1.03) translateY(-4px);
            filter: drop-shadow(0 25px 40px rgba(251, 146, 60, 0.3));
        }

        .nx-holographic-nexphant path {
            animation: stroke-glow 4s ease-in-out infinite;
        }

        /* Welcome Title & Text */
        .title {
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            font-weight: 800;
            letter-spacing: -1px;
            line-height: 1.2;
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, #f8fafc 30%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-span {
            background: linear-gradient(135deg, #c084fc 0%, #fb923c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .description {
            font-size: 0.95rem;
            color: #94a3b8;
            max-width: 360px;
            margin-bottom: 2.25rem;
            line-height: 1.6;
        }

        /* Modern, minimal actions */
        .actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.65rem 1.35rem;
            border-radius: 8px;
            transition: all 0.25s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #c084fc, #fb923c);
            color: #040408;
            box-shadow: 0 4px 15px rgba(192, 132, 252, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-1.5px);
            box-shadow: 0 6px 20px rgba(251, 146, 60, 0.3);
        }

        .btn-secondary {
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.02);
            color: #cbd5e1;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            transform: translateY(-1.5px);
        }

        /* Animations */
        @keyframes mascot-float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes stroke-glow {
            0%, 100% {
                stroke-width: 1.8px;
                opacity: 0.8;
            }
            50% {
                stroke-width: 2.8px;
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="welcome-card">
        
        <div class="mascot-container">
            <!-- Holographic Nexphant Mascot SVG -->
            <svg viewBox="0 0 1848 1555" class="nx-holographic-nexphant" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="nexphant-glow" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#c084fc" stop-opacity="0.45" />
                        <stop offset="100%" stop-color="#fb923c" stop-opacity="0.15" />
                    </linearGradient>
                    <linearGradient id="nexphant-stroke" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#c084fc" stop-opacity="0.95" />
                        <stop offset="100%" stop-color="#fb923c" stop-opacity="0.65" />
                    </linearGradient>
                </defs>
                <path d="M778.067 975.592L830.617 967.342L566.452 1209.95L733.806 986.336L672.848 995.906L930.209 778.563L778.067 975.592Z" fill="url(#nexphant-glow)" stroke="url(#nexphant-stroke)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
                <path d="M1445.61 488.562L1455.61 545.562L1400.61 530.062L1378.11 476.562L1445.61 488.562Z" fill="url(#nexphant-glow)" stroke="url(#nexphant-stroke)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1462.18 178.966L1693.12 554.96L1634.08 1125.82L1735.54 1065.81L1847.03 1222.56H1813.11C1808.39 1222.56 1801.63 1221.38 1795.47 1220.15C1789.7 1218.79 1780.63 1216.95 1772.32 1214.95C1764.3 1213.01 1755.93 1210.89 1748.11 1208.85V1258.53L1593.27 1341.68L1479.56 1243.32L1399.08 821.553L1360.74 803.309L1350.88 1544.53L1033.23 1554.44L913.864 1244.18L754.665 1299.86L753.901 1300.8L647.745 1554.06H266.105V1041.94L129.751 1128.71L0 925.24L168.474 1003.95L269.548 798.494L779.176 374.369L716.391 273.606L923.212 0L1462.18 178.966ZM297.663 820.63L184.737 1050.18L94.2109 1007.88L140.46 1080.41L301.105 978.184V1519.06H532.255L723.554 1282.66L727.977 1272.12L934.346 1199.94L1056.98 1518.68L1215.95 1513.72L1324.39 786.01L1045.04 653.076L1062.4 765.391L1030.25 777.317L797.86 404.354L297.663 820.63ZM577.279 1519.06H624.466L675.171 1398.09L577.279 1519.06ZM1251.5 1512.62L1316.33 1510.59L1322.65 1035.11L1251.5 1512.62ZM1038.58 611.239L1430.13 797.571L1511.65 1224.81L1597.94 1299.44L1713.11 1237.6V1163.09L1735.25 1169.19C1744.92 1171.85 1759.19 1175.65 1773.18 1179.12L1725.67 1112.31L1592.13 1191.3L1657.09 563.165L1439.03 208.159L951.273 46.1963L1038.58 611.239ZM758.819 275.518L1014.76 686.27L918.626 64.1074L758.819 275.518Z" fill="url(#nexphant-glow)" stroke="url(#nexphant-stroke)" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
            </svg>
        </div>

        <h1 class="title">Welcome to <span class="gradient-span">{{$title ?? 'Nexphant'}}</span></h1>
        
        <p class="description">
            The next-generation asynchronous PHP runtime. Fast, concurrent, and modern.
        </p>

        <div class="actions">
            <a href="https://nexphant.com/guide/introduction" class="btn btn-primary">Documentation</a>
            <a href="https://nexphant.com" class="btn btn-secondary">Website</a>
        </div>

    </div>

</body>
</html>