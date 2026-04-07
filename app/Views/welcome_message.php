<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CVVEN - Réservation de Séjours</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
.card-hover { transition: all 0.3s ease; }
.card-hover:hover { transform: translateY(-5px); }
.banner-bg {
background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?= base_url("img/background.jpg") ?>') center/cover no-repeat;
}
</style>
</head>
<body class="bg-gray-50 text-gray-900">
<?php
$isLoggedIn = session()->has('id_user');
?>
<nav class="sticky top-0 z-50 bg-white border-b border-gray-200 px-6 py-4">
<div class="max-w-7xl mx-auto flex justify-between items-center">
<div class="text-2xl font-bold text-[#ff385c] flex items-center gap-2">
<span>🏨</span> CVVEN
</div>
<div class="flex items-center space-x-6 font-semibold">
<a href="<?= base_url('/') ?>" class="hover:text-[#ff385c] transition text-gray-700">Accueil</a>
<a href="<?= base_url('/Connexion') ?>" class="hover:text-[#ff385c] transition border border-gray-300 rounded-full px-5 py-2 hover:bg-gray-50 text-gray-700">Connexion</a>
</div>
</div>
</nav>
<section class="banner-bg h-[450px] flex items-center justify-center text-center px-4">
<div class="max-w-2xl">
<h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">✨ Trouvez votre séjour idéal</h1>
<p class="text-white text-lg opacity-90 drop-shadow-md">Des logements d'exception pour des vacances inoubliables.</p>
</div>
</section>
<main class="max-w-7xl mx-auto px-6 py-16">
<h2 class="text-3xl font-bold mb-8 italic text-gray-800">Nos destinations coup de cœur</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
<div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200">
<img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2" class="w-full h-48 object-cover">
<div class="p-5">
<h3 class="text-lg font-bold mb-1 text-gray-800">Appartement Italien</h3>
<p class="text-gray-500 text-sm mb-4">Rome, Italie</p>
<a href="<?= base_url($isLoggedIn ? 'noface1' : 'Connexion') ?>" class="block text-center bg-[#ff385c] hover:bg-[#e60042] text-white font-bold py-2 rounded-lg transition shadow-md">Voir plus</a>
</div>
</div>
<div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200">
<img src="https://images.unsplash.com/photo-1590490360182-c33d57733427" class="w-full h-48 object-cover">
<div class="p-5">
<h3 class="text-lg font-bold mb-1 text-gray-800">Chambre Double</h3>
<p class="text-gray-500 text-sm mb-4">Mers-les-Bains, France</p>
<a href="<?= base_url($isLoggedIn ? 'noface2' : 'Connexion') ?>" class="block text-center bg-[#ff385c] hover:bg-[#e60042] text-white font-bold py-2 rounded-lg transition shadow-md">Voir plus</a>
</div>
</div>
<div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200">
<img src="https://images.unsplash.com/photo-1582719508461-905c673771fd" class="w-full h-48 object-cover">
<div class="p-5">
<h3 class="text-lg font-bold mb-1 text-gray-800">Indico Rock Hotel</h3>
<p class="text-gray-500 text-sm mb-4">Majorque, Espagne</p>
<a href="<?= base_url($isLoggedIn ? 'noface3' : 'Connexion') ?>" class="block text-center bg-[#ff385c] hover:bg-[#e60042] text-white font-bold py-2 rounded-lg transition shadow-md">Voir plus</a>
</div>
</div>
<div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200">
<img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85" class="w-full h-48 object-cover">
<div class="p-5">
<h3 class="text-lg font-bold mb-1 text-gray-800">Villa Corleane</h3>
<p class="text-gray-500 text-sm mb-4">Sicile, Italie</p>
<a href="<?= base_url($isLoggedIn ? 'noface4' : 'Connexion') ?>" class="block text-center bg-[#ff385c] hover:bg-[#e60042] text-white font-bold py-2 rounded-lg transition shadow-md">Voir plus</a>
</div>
</div>
</div>
</main>
<footer class="bg-gray-900 text-gray-400 py-12 px-6">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center border-b border-gray-800 pb-8">
<div class="text-white font-bold text-xl mb-4 md:mb-0">🏨 CVVEN Project</div>
<div class="flex gap-6 text-sm">
<a href="#" class="hover:text-white transition">Mentions légales</a>
<a href="#" class="hover:text-white transition">Confidentialité</a>
<a href="#" class="hover:text-white transition">Contact</a>
</div>
</div>
<div class="text-center mt-8 text-xs italic">© 2026 CVVEN Project - BTS SLAM - Tous droits réservés.</div>
</footer>
</body>
</html>
