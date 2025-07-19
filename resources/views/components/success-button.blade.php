<div>
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded']) }}>
        {{ $slot }}
    </button>    
</div>