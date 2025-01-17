<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
<!-- resources/views/UsersCommande.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Commandes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f3f5;
        }

        .address {
            font-size: 14px;
            color: #6c757d;
        }

        .no-commandes {
            text-align: center;
            font-size: 18px;
            color: #6c757d;
            margin-top: 20px;
        }

        .voir-produit {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .voir-produit:hover {
            background-color: #0056b3;
        }

        @media (max-width: 480px) {
            table, th, td {
                font-size: 14px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>My Commandes</h1>
    @if ($commandes->isEmpty())
        <div class="no-commandes">You have no commandes.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Date Commande</th>
                    <th>Adresse</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->dateCom }}</td>
                        <td class="address">{{ $commande->adresse }}</td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>


                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
