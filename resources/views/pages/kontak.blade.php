@extends('layouts.app')

@section('content')
<!-- <div class="container text-center">
    <h1>Hubungi Kami</h1>
    <p>Email: info@mmbakery.com</p>
    <p>Telepon: 0812-3456-7890</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d659.7947601805795!2d111.52985682624025!3d-7.650784023399573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1742530968748!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        iframe {
            width: 600px;
            height: 450px;
            border: 0;
        }
        .buttons {
            margin-top: 10px;
        }
        button {
            margin: 5px;
            padding: 10px;
            cursor: pointer;
        }
    </style>
    <h2>Peta Lokasi</h2>
    <div class="container text-center">
    <h1>Hubungi Kami</h1>
    <p>Email: info@mmbakery.com</p>
    <p>Telepon: 0812-3456-7890</p>
    <iframe id="mapFrame" 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d659.7947601805795!2d111.52985682624025!3d-7.650784023399573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1742530968748!5m2!1sid!2sid" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    
    <div class="buttons">
        <button onclick="changeLocation(0)">Toko Roti MM Bakery</button>
        <button onclick="changeLocation(1)">Ayam Geprak Mak Sunah</button>
        <button onclick="changeLocation(2)">Magom's Recipes</button>
    </div>

    <script>
        const locations = [
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d659.7947601805795!2d111.52985682624025!3d-7.650784023399573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be8394a4148b%3A0x9221a2f81f144c72!2sToko%20Roti%20MM%20Bakery%20Pusat%20Madiun!5e0!3m2!1sid!2sid!4v1742530968748!5m2!1sid!2sid",
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d659.7947601805795!2d111.52985682624025!3d-7.650784023399573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be81f5b49d9b%3A0xa966c8591d1b65ff!2sAyam%20Geprak%20Mak%20Sunah!5e0!3m2!1sid!2sid!4v1742531141211!5m2!1sid!2sid",
            "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d659.7941673449474!2d111.52862161602462!3d-7.651167255524393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bfa037225137%3A0x743d598f7e87f782!2sMagom's%20Recipes!5e0!3m2!1sid!2sid!4v1742531359459!5m2!1sid!2sid"
        ];

        function changeLocation(index) {
            document.getElementById("mapFrame").src = locations[index];
        }
    </script>
@endsection
