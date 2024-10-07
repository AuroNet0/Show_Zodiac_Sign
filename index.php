<?php include 'layouts/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Descubra seu Signo Zodiacal</h1>
    
    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
        <div class="mb-3">
            <label  for="birthdate" class="form-label">Insira sua Data de Nascimento:</label>
            <input type="date" id="birthdate" name="birthdate" class="form-control" required>
        </div>
        <button type="submit" >Descobrir Signo</button>
    </form>
</div>

<footer class="mt-5 text-center">
    <p>&copy; 2024 Descubra Seu Signo</p>
</footer>

</body>
</html>
