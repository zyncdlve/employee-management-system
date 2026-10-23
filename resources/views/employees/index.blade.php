<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees | Employee Management System</title>

    <style>
        :root {
            --purple: #7c3aed;
            --purple-dark: #5b21b6;
            --purple-soft: #f5f3ff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --white: #fff;
            --danger: #dc2626;
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
            justify-content: space-between;
            align-items: center;
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
            color: rgba(255,255,255,.86);
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover { color: white; }

        nav form { margin: 0; }

        nav button {
            padding: 9px 14px;
            border: 1px solid rgba(255,255,255,.35);
            border-radius: 8px;
            color: white;
            background: rgba(255,255,255,.12);
            cursor: pointer;
            font: inherit;
            font-size: 13px;
        }

        main {
            width: min(1200px, 100%);
            margin: 0 auto;
            padding: 48px 6%;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 26px;
        }

        .eyebrow {
            margin: 0 0 8px;
            color: var(--purple);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 8px;
            font-size: clamp(28px, 4vw, 38px);
            letter-spacing: -.8px;
        }

        .page-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
        }

        .add-button {
            padding: 12px 17px;
            border-radius: 9px;
            color: white;
            background: var(--purple);
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .add-button:hover { background: var(--purple-dark); }

        .success {
            margin: 0 0 20px;
            padding: 13px 16px;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            color: #166534;
            background: #f0fdf4;
            font-size: 14px;
        }

        .table-container {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: var(--white);
            box-shadow: 0 8px 24px rgba(31,41,55,.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            white-space: nowrap;
            font-size: 14px;
        }

        th {
            color: var(--muted);
            background: #fafafa;
            font-size: 12px;
            letter-spacing: .4px;
            text-transform: uppercase;
        }

        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fcfaff; }

        .id { color: var(--muted); }
        .name { font-weight: bold; }

        .gender {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 999px;
            color: var(--purple-dark);
            background: var(--purple-soft);
            font-size: 12px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-button,
        .delete-button {
            padding: 7px 10px;
            border-radius: 7px;
            font: inherit;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-button {
            border: 1px solid #c4b5fd;
            color: var(--purple-dark);
            background: var(--purple-soft);
        }

        .delete-button {
            border: 1px solid #fecaca;
            color: var(--danger);
            background: #fef2f2;
        }

        .empty {
            padding: 48px 20px;
            color: var(--muted);
            text-align: center;
        }

        @media (max-width: 650px) {
            header {
                align-items: flex-start;
                flex-direction: column;
                padding: 16px 5%;
            }

            nav {
                width: 100%;
                justify-content: space-between;
            }

            main { padding: 38px 5%; }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .add-button { width: 100%; text-align: center; }
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
        <div class="page-heading">
            <div>
                <p class="eyebrow">Directory</p>
                <h1>Employee List</h1>
                <p>View and manage all employee records.</p>
            </div>

            <a class="add-button" href="{{ route('employees.create') }}">
                + Add Employee
            </a>
        </div>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>Monthly Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td class="id">#{{ $employee->id }}</td>
                            <td class="name">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </td>
                            <td><span class="gender">{{ $employee->gender }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($employee->birthday)->format('M j, Y') }}</td>
                            <td>₱{{ number_format($employee->monthly_salary, 2) }}</td>
                            <td>
                                <div class="actions">
                                    <a class="edit-button" href="{{ route('employees.edit', $employee->id) }}">
                                        Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('employees.destroy', $employee->id) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                No employee records found yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>