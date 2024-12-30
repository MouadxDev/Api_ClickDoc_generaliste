<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Paiement</title>
    <style>
        @page {
            size: A4;
            margin: 0.3in;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f8f9fa;
        }

        .receipt-container {
            max-width: 700px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 120px;
        }

        .header h1 {
            font-size: 1.5rem;
            margin: 10px 0 5px;
            color: #333;
        }

        .header p {
            font-size: 0.9rem;
            margin: 0;
            color: #777;
        }

        .details {
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
        }

        .details th, .details td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .details th {
            font-weight: bold;
            background: #f4f4f4;
        }

        .summary {
            text-align: right;
            margin-top: 20px;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary th, .summary td {
            padding: 8px;
            text-align: right;
        }

        .summary th {
            font-weight: bold;
            background: #f4f4f4;
            text-align: left;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #777;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="header">
            @if($entity['logo'])
                <img src="{{ $entity['logo'] }}" alt="Entity Logo">
            @endif
            <h1>Reçu de Paiement</h1>
            <p>{{ $entity['name'] }}</p>
            <p>{{ $entity['address'] }}, {{ $entity['city'] }}</p>
            <p>{{ $entity['email'] }}</p>
            <p><strong>Docteur:</strong> {{ $doctor }}</p>
        </div>

        <!-- Details -->
        <div class="details">
            <table>
                <tr>
                    <th>Date</th>
                    <td>{{ date('d/m/Y', strtotime($payment_date)) }}</td>
                </tr>
                <tr>
                    <th>Reçu Pour</th>
                    <td>{{ $patient }}</td>
                </tr>
                <tr>
                    <th>Montant</th>
                    <td>{{ number_format($payment_value, 2) }} MAD</td>
                </tr>
            </table>
        </div>

        <!-- Summary -->
        <div class="summary">
            <table>
                <tr>
                    <th>Total:</th>
                    <td><strong>{{ number_format($payment_value, 2) }} MAD</strong></td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Merci pour votre paiement !</p>
            <p>Ce reçu est généré électroniquement et ne nécessite pas de signature.</p>
        </div>
    </div>
</body>
</html>
