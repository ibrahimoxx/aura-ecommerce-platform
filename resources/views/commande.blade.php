<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        form {
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            outline: none;
            transition: border-color 0.3s ease;
        }

        form textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        form button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        form button:active {
            background-color: #004494;
        }

        @media (max-width: 480px) {
            form {
                padding: 15px;
            }

            form textarea {
                font-size: 14px;
            }

            form button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<form action="{{route('validerCommande')}}" method="GET">
    <label for="adresse">Adresse</label>
    <textarea id="adresse" name="adresse" rows="3" required>{{Auth::user()->address}}</textarea>
    <button type="submit">Valider</button>
</form>

</body>
</html>
