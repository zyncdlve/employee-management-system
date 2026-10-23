<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Employee Management System</title>

    <style>
        :root {
            --purple: #7c3aed;
            --purple-dark: #5b21b6;
            --purple-soft: #f5f3ff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --white: #ffffff;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);
            background: #fafafa;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 18px 6%;
            color: white;
            background: linear-gradient(135deg, var(--purple-dark), var(--purple));
            box-shadow: 0 4px 16px rgba(91, 33, 182, .15);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 18px;
            font-weight: bold;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        nav a {
            color: rgba(255, 255, 255, .86);
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover { color: white; }

        nav form { margin: 0; }

        nav button {
            padding: 9px 14px;
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 8px;
            color: white;
            background: rgba(255, 255, 255, .12);
            cursor: pointer;
            font: inherit;
            font-size: 13px;
        }

        nav button:hover { background: rgba(255, 255, 255, .22); }

        main {
            width: min(1100px, 100%);
            margin: 0 auto;
            padding: 54px 6%;
        }

        .welcome { margin-bottom: 34px; }

        .eyebrow {
            margin: 0 0 9px;
            color: var(--purple);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 10px;
            font-size: clamp(28px, 4vw, 38px);
            letter-spacing: -.8px;
        }

        .welcome p {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            min-height: 148px;
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: var(--white);
            box-shadow: 0 8px 24px rgba(31, 41, 55, .05);
        }

        .card:hover {
            border-color: #c4b5fd;
            transform: translateY(-2px);
            transition: .2s ease;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            margin-bottom: 20px;
            border-radius: 10px;
            color: var(--purple-dark);
            background: var(--purple-soft);
            font-size: 13px;
            font-weight: bold;
        }

        .card h2 {
            margin: 0 0 8px;
            color: var(--muted);
            font-size: 13px;
            font-weight: normal;
        }

        .value {
            margin: 0;
            color: var(--text);
            font-size: 25px;
            font-weight: bold;
        }

        .action-area {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-top: 32px;
            padding: 24px;
            border-radius: 15px;
            background: var(--purple-soft);
        }

        .action-area h2 {
            margin: 0 0 6px;
            font-size: 18px;
        }

        .action-area p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }

        .employee-link {
            display: inline-block;
            padding: 12px 17px;
            border-radius: 9px;
            color: white;
            background: var(--purple);
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .employee-link:hover { background: var(--purple-dark); }

        @media (max-width: 800px) {
            header { padding: 16px 5%; }
            nav { gap: 12px; }
            .summary-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 560px) {
            header { align-items: flex-start; flex-direction: column; }
            nav { width: 100%; justify-content: space-between; }
            main { padding: 38px 5%; }
            .summary-grid { grid-template-columns: 1fr; }
            .action-area { align-items: flex-start; flex-direction: column; }
            .employee-link { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>
    <header>
        <div class="brand">
            <span>Employee Management System</span>
        </div>

        <nav aria-label="Main navigation">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('employees.index') }}">Employees</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </header>

    <main>
        <section class="welcome">
            <p class="eyebrow">Overview</p>
            <h1>Dashboard</h1>
            <p>
                Welcome back, {{ Auth::user()->name }}. Here is your employee summary.
            </p>
        </section>

        <section class="summary-grid" aria-label="Employee summary">
        <article class="card">
            <div class="card-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M3 21v-2a7 7 0 0 1 14 0v2"/>
                    <path d="M19 8v6"/>
                    <path d="M22 11h-6"/>
                </svg>
            </div>
            <h2>Male Employees</h2>
            <p class="value">{{ $maleCount }}</p>
        </article>

        <article class="card">
            <div class="card-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="7" r="4"/>
                    <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                    <path d="M12 18v4"/>
                    <path d="M9 21h6"/>
                </svg>
            </div>
            <h2>Female Employees</h2>
            <p class="value">{{ $femaleCount }}</p>
        </article>

        <article class="card">
            <div class="card-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2"/>
                </svg>
            </div>
            <h2>Average Age</h2>
            <p class="value">{{ number_format($averageAge, 1) }} years</p>
        </article>

        <article class="card">
            <div class="card-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="6" width="20" height="13" rx="2"/>
                    <path d="M16 12h.01"/>
                    <path d="M2 10h20"/>
                    <path d="M6 6V4h12v2"/>
                </svg>
            </div>
            <h2>Total Monthly Salary</h2>
            <p class="value">₱{{ number_format($totalMonthlySalary, 2) }}</p>
        </article>
    </section>

        <section class="action-area">
            <div>
                <h2>Manage your employees</h2>
                <p>View, add, edit, or remove employee records.</p>
            </div>

            <a class="employee-link" href="{{ route('employees.index') }}">
                View Employee List
            </a>
        </section>
    </main>
</body>
</html>