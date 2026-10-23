
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 40px 16px;
            font-family: Arial, sans-serif;
            background: #f6f3fb;
            color: #27213a;
        }

        .container {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
            padding: 34px;
            background: #fff;
            border: 1px solid #e9e1f5;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(76, 43, 122, .10);
        }

        .header { margin-bottom: 28px; }

        .back-link {
            display: inline-block;
            margin-bottom: 22px;
            color: #7651a8;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .back-link:hover { color: #5b338d; }

        h1 {
            margin: 0 0 8px;
            color: #3d2361;
            font-size: 30px;
        }

        .subtitle {
            margin: 0;
            color: #766b85;
            font-size: 15px;
        }

        .errors {
            margin-bottom: 22px;
            padding: 14px 18px;
            color: #9b2c52;
            background: #fff0f4;
            border: 1px solid #f4c8d5;
            border-radius: 10px;
        }

        .errors ul { margin: 0; padding-left: 20px; }
        .errors li + li { margin-top: 5px; }

        form { display: grid; gap: 18px; }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        label {
            color: #4a3a5b;
            font-size: 14px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 12px 13px;
            color: #332642;
            background: #fdfcff;
            border: 1px solid #dcd1e9;
            border-radius: 9px;
            outline: none;
            font: inherit;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus, select:focus {
            border-color: #8558bd;
            box-shadow: 0 0 0 3px rgba(133, 88, 189, .15);
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
            padding-top: 22px;
            border-top: 1px solid #eee8f5;
        }

        button, .cancel {
            display: inline-block;
            padding: 12px 18px;
            border: 0;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        button {
            color: #fff;
            background: #7042a4;
        }

        button:hover { background: #5b338d; }

        .cancel {
            color: #584a68;
            background: #eeeaf4;
        }

        .cancel:hover { background: #e2dbea; }

        @media (max-width: 560px) {
            body { padding: 20px 12px; }
            .container { padding: 24px 18px; }
            h1 { font-size: 25px; }
            .form-row { grid-template-columns: 1fr; gap: 18px; }
            .actions { flex-direction: column; }
            button, .cancel { width: 100%; }
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="header">
            <a class="back-link" href="{{ route('employees.index') }}">
                &larr; Back to employees
            </a>

            <h1>Edit Employee</h1>
            <p class="subtitle">
                Update the employee's information below.
            </p>
        </div>

        @if ($errors->any())
            <div class="errors" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="field">
                    <label for="first_name">First Name</label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        value="{{ old('first_name', $employee->first_name) }}"
                        required
                    >
                </div>

                <div class="field">
                    <label for="last_name">Last Name</label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        value="{{ old('last_name', $employee->last_name) }}"
                        required
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select gender</option>
                        <option value="Male"
                            @selected(old('gender', $employee->gender) === 'Male')>
                            Male
                        </option>
                        <option value="Female"
                            @selected(old('gender', $employee->gender) === 'Female')>
                            Female
                        </option>
                    </select>
                </div>

                <div class="field">
                    <label for="birthday">Birthday</label>
                    <input
                        type="date"
                        id="birthday"
                        name="birthday"
                        value="{{ old('birthday', \Carbon\Carbon::parse($employee->birthday)->format('Y-m-d')) }}"
                        max="{{ date('Y-m-d') }}"
                        required
                    >
                </div>
            </div>

            <div class="field">
                <label for="monthly_salary">Monthly Salary (₱)</label>
                <input
                    type="number"
                    id="monthly_salary"
                    name="monthly_salary"
                    value="{{ old('monthly_salary', $employee->monthly_salary) }}"
                    min="0"
                    step="0.01"
                    required
                >
            </div>

            <div class="actions">
                <button type="submit">Update Employee</button>

                <a class="cancel" href="{{ route('employees.index') }}">
                    Cancel
                </a>
            </div>
        </form>
    </main>
</body>
</html>
