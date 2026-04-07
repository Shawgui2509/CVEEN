<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Indico Rock Hotel - Appt 07 | CVVEN</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
.notification { transition: opacity 0.3s ease; }
.image-grid { display: grid; grid-template-columns: 2fr 1fr; grid-template-rows: 1fr 1fr; gap: 10px; height: 450px; }
@media (max-width: 768px) { .image-grid { grid-template-columns: 1fr; height: auto; } }
</style>
</head>
<body class="bg-white text-gray-900 font-sans">
<div id="notification" class="hidden fixed top-5 right-5 z-50 bg-green-600 text-white px-6 py-3 rounded-lg shadow-xl">✅ Réservation réussie !</div>
<div id="errorNotification" class="hidden fixed top-5 right-5 z-50 bg-red-600 text-white px-6 py-3 rounded-lg shadow-xl">❌ Veuillez sélectionner vos dates.</div>
<nav class="border-b px-6 py-4 mb-8"><div class="max-w-6xl mx-auto flex justify-between items-center"><a href="/" class="text-[#ff385c] font-bold text-xl flex items-center gap-2"><span>🏨</span> CVVEN</a><a href="/" class="text-sm font-semibold hover:underline">Retour à l'accueil</a></div></nav>
<main class="max-w-6xl mx-auto px-4">
<header class="mb-6"><h1 class="text-3xl font-semibold text-gray-800">Indico Rock Hotel, - Appt 07</h1><div class="flex items-center space-x-2 text-sm mt-2 font-medium underline"><span>⭐ 4,89 · 71 commentaires</span><span>·</span><span>Rome, Italie</span></div></header>
<section class="image-grid rounded-2xl overflow-hidden mb-10 shadow-sm">
<div class="grid-span-1 row-span-2 overflow-hidden"><img src="<?= base_url('img/offre1c.jpeg'); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-500 cursor-pointer" alt="Main Photo"></div>
<div class="hidden md:block overflow-hidden"><img src="<?= base_url('img/offre2c.jpeg'); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-500 cursor-pointer" alt="Photo 2"></div>
<div class="hidden md:block overflow-hidden"><img src="<?= base_url('img/offre3c.jpeg'); ?>" class="w-full h-full object-cover hover:scale-105 transition duration-500 cursor-pointer" alt="Photo 3"></div>
</section>
<div class="flex flex-col lg:flex-row gap-12">
<div class="lg:w-2/3">
<div class="border-b pb-6"><h2 class="text-2xl font-semibold text-gray-800">Logement entier proposé par Compagnie Des Bains Du Nord</h2><p class="text-gray-600 mt-1 text-lg">4 voyageurs · 1 chambre · 2 lits · 1 salle de bain</p></div>
<div class="py-8 border-b space-y-6"><div class="flex items-start space-x-4"><span class="text-2xl text-[#ff385c]">🎸</span><div><p class="font-semibold text-lg">Ambiance Indico Rock</p><p class="text-gray-500 text-sm">Un logement au design unique alliant confort et style moderne.</p></div></div><div class="flex items-start space-x-4"><span class="text-2xl text-[#ff385c]">🏖️</span><div><p class="font-semibold text-lg">À deux pas de l'eau</p><p class="text-gray-500 text-sm">Situé à seulement 4 minutes de marche de la plage.</p></div></div></div>
<div class="py-8"><h2 class="text-xl font-semibold mb-6 italic text-gray-700">Ce que propose ce logement</h2><div class="grid grid-cols-1 md:grid-cols-2 gap-y-4"><div class="flex items-center space-x-4 italic"><span>🌊</span> <span>Vue sur l'océan</span></div><div class="flex items-center space-x-4 italic"><span>🍽️</span><span>Cuisine équipée</span></div><div class="flex items-center space-x-4 italic"><span>📶</span> <span>Wifi premium</span></div><div class="flex items-center space-x-4 italic"><span>🏖️</span><span>Accès plage</span></div><div class="flex items-center space-x-4 text-gray-400 line-through"><span>🚫</span> <span>Détecteur de monoxyde</span></div></div></div>
</div>
<div class="lg:w-1/3"><div class="sticky top-8 border rounded-2xl p-6 shadow-2xl bg-white border-gray-100"><div class="flex justify-between items-end mb-6"><div><span class="text-2xl font-bold">180€</span><span class="text-gray-600 text-sm">/ nuit</span></div><div class="text-sm font-semibold">⭐ 4,89</div></div><div class="border rounded-xl mb-4 overflow-hidden"><div class="grid grid-cols-2 border-b"><div class="p-3 border-r hover:bg-gray-50 cursor-pointer"><label class="block text-[10px] font-bold uppercase text-gray-700">Arrivée</label><input type="date" id="debut" class="w-full text-sm outline-none bg-transparent"></div><div class="p-3 hover:bg-gray-50 cursor-pointer"><label class="block text-[10px] font-bold uppercase text-gray-700">Départ</label><input type="date" id="fin" class="w-full text-sm outline-none bg-transparent"></div></div><div class="p-3"><label class="block text-[10px] font-bold uppercase text-gray-700">Voyageurs</label><select class="w-full text-sm outline-none bg-transparent"><option>4 voyageurs</option><option>2 voyageurs</option></select></div></div><button onclick="reserver()" class="w-full bg-[#ff385c] hover:bg-[#e60042] text-white font-bold py-3 rounded-xl transition duration-200 shadow-md">Réserver</button><p class="text-center text-xs text-gray-500 mt-4 italic underline">Aucun débit immédiat</p></div></div>
</div>
</main>
<script>
function reserver() {
const start = document.getElementById('debut').value;
const end = document.getElementById('fin').value;
if(!start || !end) {
const err = document.getElementById('errorNotification');
err.classList.remove('hidden');
setTimeout(() => err.classList.add('hidden'), 3000);
return;
}
const notif = document.getElementById('notification');
notif.classList.remove('hidden');
setTimeout(() => notif.classList.add('hidden'), 3000);
}
</script>
</body>
</html>
