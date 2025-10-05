# Thermal Printer Setup Guide

Panduan untuk mengkonfigurasi printer thermal pada sistem POS Kasir.

## Konfigurasi Printer

### 1. File Printer (Default - Untuk Testing)

Printer menyimpan struk ke file teks di folder `storage/receipts/`.

**Konfigurasi Environment:**

```bash
PRINTER_TYPE=file
```

### 2. Windows Printer

Untuk printer thermal yang terhubung ke Windows.

**Konfigurasi Environment:**

```bash
PRINTER_TYPE=windows
PRINTER_NAME=POS-58  # Ganti dengan nama printer thermal Anda
```

**Cara mengetahui nama printer:**

1. Buka Control Panel > Devices and Printers
2. Cari printer thermal Anda
3. Gunakan nama yang tertera di situ

### 3. Network Printer

Untuk printer thermal yang terhubung via jaringan.

**Konfigurasi Environment:**

```bash
PRINTER_TYPE=network
PRINTER_IP=192.168.1.100  # IP address printer
PRINTER_PORT=9100         # Port printer (default: 9100)
```

## Testing Printer

### Via Command Line

```bash
# Test print sederhana
php artisan receipt:test

# Print struk untuk transaksi tertentu
php artisan receipt:test --sale_id=1
```

### Via Web Browser

Kunjungi: `http://your-app-url/test-receipt`

## Konfigurasi Toko

Edit file `.env` untuk mengubah informasi toko:

```bash
STORE_NAME="Nama Toko Anda"
STORE_ADDRESS="Alamat Toko"
STORE_PHONE="Nomor Telepon"
RECEIPT_FOOTER="Pesan Footer"
```

## Troubleshooting

### Error: "Printer tidak dapat diakses"

-   Pastikan printer terhubung dan menyala
-   Untuk Windows printer: pastikan nama printer benar
-   Untuk Network printer: pastikan IP dan port benar

### Error: "Permission denied"

-   Pastikan folder `storage/receipts/` memiliki permission write
-   Untuk Windows printer: pastikan aplikasi memiliki akses ke printer

### Struk tidak terpotong

-   Beberapa printer thermal memerlukan konfigurasi khusus untuk auto-cut
-   Cek dokumentasi printer Anda

## Printer Thermal yang Direkomendasikan

-   Epson TM-T88
-   Citizen CT-S310
-   Star Micronics
-   Printer thermal 58mm/80mm generic

## Format Struk

Struk akan berisi:

-   Header toko (nama, alamat, telepon)
-   Tanggal dan nomor transaksi
-   Daftar item (nama, qty, harga)
-   Total, pembayaran, kembalian
-   Footer pesan

Lebar struk: 32 karakter per baris (sesuai standar thermal printer).
