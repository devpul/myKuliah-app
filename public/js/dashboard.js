
// Toggle Chatbot
document.getElementById('open-chatbot').addEventListener('click', function() {
    document.getElementById('chatbot').classList.toggle('hidden');
    document.getElementById('open-chatbot').classList.add('hidden');
});
document.getElementById('close-chatbot').addEventListener('click', function() {
    document.getElementById('chatbot').classList.add('hidden');
    document.getElementById('open-chatbot').classList.remove('hidden');
});

// Simulasi AI Responses (seperti Blackbox AI)
const responses = {
    'jadwal': 'Jadwal kuliah Anda hari ini: Pemrograman Web pukul 08:00 di Lab Komputer 1. Lihat dashboard untuk detail lengkap!',
    'tugas': 'Progress tugas Anda: Algoritma 75%. Fokus selesaikan bagian terakhir untuk deadline 15 Oktober.',
    'tips belajar': 'Tips: Buat jadwal harian, istirahat setiap 1 jam, dan gunakan teknik Pomodoro untuk produktivitas maksimal.',
    'default': 'Maaf, saya belum paham pertanyaan Anda. Coba tanya tentang jadwal, tugas, atau tips belajar!'
};

function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }