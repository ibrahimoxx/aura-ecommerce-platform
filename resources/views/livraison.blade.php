<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <!-- resources/views/livraison.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status.pending {
            background-color: #ffc107;
            color: #fff;
        }

        .status.completed {
            background-color: #28a745;
            color: #fff;
        }

        .status.canceled {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Livraison List</h1>
    <table>
        <thead>
            <tr>
                <th>Code Commande</th>
                <th>ID Client</th>
                <th>Date Livraison</th>
                <th>Prix Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livraison as $liv)
                <tr>
                    <td>{{ $liv->codeCom }}</td>
                    <td>{{ $liv->idClient }}</td>
                    <td>{{ $liv->dateLiv }}</td>
                    <td>{{ $liv->prixtotal }} €</td>
                    <td>
                        <span class="status {{ strtolower($liv->status) }}">
                            {{ $liv->status }}
                        </span>
                    </td>
                    <td> <a href="{{Route('valider',$liv->id)}}">valider</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
