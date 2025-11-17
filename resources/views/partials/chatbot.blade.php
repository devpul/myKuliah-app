
<div id="chat" class="hidden absolute bottom-20 right-4 bg-gray-300 py-3 px-1 w-[200px] h-[250px] ">
    <div class="w-full mt-2 bg-white py-2"></div>
    <div class="w-full mt-2 bg-white py-2"></div>
    <div class="w-full mt-2 bg-white py-2"></div>
</div>

<div id="toggle" class="absolute right-2 bottom-2 cursor-pointer bg-black rounded-full p-6">
    
</div>

<script>
    document.querySelector('#toggle').addEventListener('click', function () {
        document.querySelector('#chat').classList.toggle('hidden');
    });
</script>