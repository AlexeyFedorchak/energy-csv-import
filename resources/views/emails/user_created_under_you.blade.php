<!DOCTYPE html>
<html>
<head>
    <title>Ein Account wurde mit deiner Weiterempfehlung erstellt.</title>
</head>
<body>
    <p>Hallo, {{ $referrer->name }},</p>
    <p>Ein neuer User Account wurde mit deiner Empfehlung erstellt. </p>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Vielen Dank für die Weiterempfehlung!</p>
    <p><b>Mit freundlichen Grüßen!<br />Ihr Energy Group Team</b></p>
</body>
</html>