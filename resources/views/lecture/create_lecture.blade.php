@extends('layout')

@section('content')
    <h1>FORM CREATE LECTURER</h1>

    <div id="addForm" class="py-1 bg-blue-500 rounded inline-block cursor-pointer text-white">Tambah</div>

    <form id="formSubject" action="{{ route('store_subject') }}" method="POST"
        class="flex flex-col gap-y-5 bg-white shadow p-5">
        @csrf

        <div id="input-group" class="flex flex-col gap-y-5">
            <div class="input-group flex flex-col gap-y-2">
                <label>Nama Pengajar</label>
                <input type="text" name="subject_code[]" minlength="3" maxlength="8" class="border" required>
            </div>
            
            <div class="input-group flex flex-col gap-y-2">
                <label>Mata Kuliah</label>
                <input type="text" name="subject_name[]" class="border" required>
            </div>
        </div>
        <div id="sini"></div>
        <button type="submit" class="bg-blue-500 font-semibold text-white py-1 px-3">Simpan Mata Kuliah</button>
    </form>

    <script>
        const addForm = document.getElementById('addForm');
        const inputGroup = document.getElementById('input-group');
        const sini = document.getElementById('sini');

        addForm.addEventListener('click', function() {
            const count = sini.querySelectorAll('#input-group').length;

            if (count == 3) {
                alert('Maksimal 3 form');
                return;
            }

            const clone = inputGroup.cloneNode(true);
            clone.querySelectorAll('input, textarea').forEach(function(e) {
                e.value = "";
            });

            sini.appendChild(clone);
        });
    </script>
@endsection
