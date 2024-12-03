<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Anggota</title>
    <style>
        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .card {
            width: 340px;
            height: 180px;
            padding: 15px;
            border-radius: 12px;
            background: linear-gradient(135deg, #6e7dff, #5c6bc0);
            color: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }
        .foto {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 3px solid #fff;
            position: absolute;
            top: 15px;
            left: 15px;
        }
        h2, h3, p {
            margin: 0;
            padding-left: 110px;
            color: white;
        }
        h2 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        h3 {
            font-size: 14px;
            font-weight: 500;
            margin: 4px 0;
        }
        p {
            font-size: 12px;
            margin: 2px 0;
        }
        .qr-code {
            position: absolute;
            bottom: 15px;
            left: 15px;
            width: 50px;
            height: 50px;
            overflow: hidden;
        }
        .qr-code img {
            width: 100%;
            height: 100%;
        }
        .button-container {
            margin-top: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #6c757d; /* Warna latar belakang tombol */
            color: white; /* Warna teks */
            padding: 10px 15px; /* Padding untuk tombol */
            border: none; /* Tanpa border */
            border-radius: 5px; /* Radius border */
            text-decoration: none; /* Tanpa garis bawah */
            font-size: 14px; /* Ukuran font */
            transition: background-color 0.3s, transform 0.3s; /* Transisi untuk efek hover */
        }
        .back:hover {
            background-color: #5a6268; /* Warna saat hover */
            transform: scale(1.05); /* Efek zoom saat hover */
        }
        @media print {
            .button-container {
                display: none; /* Sembunyikan tombol saat mencetak */
            }
             .back {
                display: none; /* Sembunyikan tombol saat mencetak */
            }
        }
    </style>
</head>
<body>
 <div class="back">
        <a href="javascript:history.back()" class="btn btn-outline-primary">
                  <i class="ti ti-arrow-left"></i>
                  Kembali
                </a>
    </div>
<div class="card" id="idCard">
    <img class="foto" src="<?= base_url('uploads/members/' . $member['foto']) ?>" alt="Foto Anggota" />
    <h2>Kartu Anggota Perpustakaan Cakrawala</h2>
    <h3><?= esc($member['first_name'] . ' ' . $member['last_name']) ?></h3>
    <p>NIK: <?= esc($member['Nik']) ?></p>
    <p>Email: <?= esc($member['email']) ?></p>
    <p>Telepon: <?= esc($member['phone']) ?></p>
    <div class="qr-code">
        <img src="<?= base_url(MEMBERS_QR_CODE_URI . $member['qr_code']); ?>" alt="QR Code">
    </div>
    <p>Member Since: <?= esc(date('d-m-Y', strtotime($member['created_at']))) ?></p>
</div>

<div class="button-container">
    <button onclick="window.print()">Print Kartu Anggota</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    async function downloadCard() {
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('landscape');

        const canvas = await html2canvas(document.querySelector("#idCard"), { scale: 2 });
        const imgData = canvas.toDataURL('image/png');
        pdf.addImage(imgData, 'PNG', 10, 10, 280, 160); // Adjust the dimensions as needed
        pdf.save('id_card.pdf');
    }
</script>

</body>
</html>
