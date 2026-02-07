<!DOCTYPE html>
<html>
<head>
    <title>Ticket de Voyage</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid orange; padding-bottom: 10px; margin-bottom: 20px; }
        .info { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .ticket-box { border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="ticket-box">
        <div class="header">
            <h1>SATAS BUS</h1>
            <p>Ticket Électronique</p>
        </div>

        <div class="info">
            <span class="label">Passager :</span> {{ $reservation->user->name }}
        </div>
        <div class="info">
            <span class="label">Trajet :</span> {{ $reservation->programme->route->nom }}
        </div>
        <div class="info">
            <span class="label">Date & Heure :</span> {{ $reservation->programme->jour_depart }} à {{ $reservation->programme->heure_depart }}
        </div>
        <div class="info">
            <span class="label">Bus Matricule :</span> {{ $reservation->programme->bus->matricule }}
        </div>
        <div class="info">
            <span class="label">Nombre de places :</span> {{ $reservation->nombre_places }}
        </div>

        <div class="footer">
            Merci de voyager avec nous !<br>
            Présentez ce ticket au chauffeur.
        </div>
    </div>
</body>
</html>
