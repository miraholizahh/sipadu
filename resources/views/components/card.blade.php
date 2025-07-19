@props([
    'imageSrc' => '',
    'title' => '',
    'status' => '',
    'id' => '',
])

<div class="card bg-white rounded shadow p-4">
    <img src="{{ $imageSrc }}" alt="{{ $title }}" class="card-image w-full h-48 object-cover rounded">
    <h3 class="card-title text-lg font-semibold mt-2">{{ $title }}</h3>
    <div class="mt-2 flex justify-between">
        <button class="card-detail-btn bg-blue-500 text-white px-4 py-2 rounded" onclick="showBuildingDetail('{{ $id }}')">
            Detail
        </button>
    </div>
</div>

<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
        <h3 id="modalTitle" class="text-2xl font-bold mb-4"></h3>
        <p id="modalCapacity"></p>
        <p id="modalFacilities"></p>
        <img id="modalImage" src="" alt="Foto Gedung" class="w-full h-auto mt-4">
        <button class="mt-4 bg-red-500 text-white px-4 py-2 rounded" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
    function showBuildingDetail(buildingId) {
        fetch(`/get-building-details/${buildingId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').textContent = data.nama_gedung;
                document.getElementById('modalCapacity').textContent = 'Kapasitas: ' + data.kapasitas;
                document.getElementById('modalFacilities').textContent = 'Fasilitas: ' + data.fasilitas;

                if (data.foto) {
                    document.getElementById('modalImage').src = `/storage/foto_gedung/${data.foto}`;
                    document.getElementById('modalImage').alt = 'Foto Gedung';
                } else {
                    document.getElementById('modalImage').src = '';
                    document.getElementById('modalImage').alt = 'No Image';
                }
                
                document.getElementById('detailModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }
</script>
