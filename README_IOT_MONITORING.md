# Sistem Pemantauan Ruang Pasien Menggunakan IoT

Sistem pemantauan real-time untuk ruang pasien menggunakan teknologi IoT dengan Laravel, Livewire, Blade, MySQL, dan Bootstrap 5.3.

## Fitur

- ✅ **Pemantauan Real-time** - Update otomatis setiap 5 detik menggunakan Livewire polling
- ✅ **3 Sensor Monitoring**:
  - Sensor Suhu (Temperature)
  - Sensor Kepekatan Asap (Smoke Density)
  - Deteksi Kebakaran (Fire Detection berdasarkan suhu tidak wajar)
- ✅ **Visualisasi Data** - Grafik interaktif menggunakan Chart.js untuk 3 elemen sensor
- ✅ **Status Monitoring** - Indikator status: Normal, Warning, Danger
- ✅ **Multiple Rooms** - Mendukung pemantauan beberapa ruang pasien
- ✅ **API Endpoint** - Endpoint untuk menerima data dari device IoT

## Teknologi yang Digunakan

- **Backend**: Laravel 12, PHP 8.2+
- **Frontend**: Livewire 3, Blade Templates, Bootstrap 5.3
- **Database**: MySQL
- **Charts**: Chart.js 4.4
- **Icons**: Font Awesome 6.5

## Instalasi

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Setup Environment

Copy file `.env.example` ke `.env` dan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=klinik
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Seed Sample Data

```bash
php artisan db:seed
```

Ini akan membuat 5 ruang sample dengan data sensor awal.

### 6. Build Assets

```bash
npm run build
```

atau untuk development:

```bash
npm run dev
```

### 7. Start Server

```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## Struktur Database

### Tabel: `rooms`
- `id` - Primary key
- `room_number` - Nomor ruang (unique)
- `patient_name` - Nama pasien (nullable)
- `status` - Status ruang (active, maintenance, occupied)
- `timestamps`

### Tabel: `sensor_readings`
- `id` - Primary key
- `room_id` - Foreign key ke rooms
- `temperature` - Suhu dalam derajat Celsius (decimal 5,2)
- `smoke_density` - Kepekatan asap dalam ppm (decimal 5,2)
- `fire_detected` - Boolean, deteksi kebakaran
- `alert_message` - Pesan peringatan (nullable)
- `status` - Status: normal, warning, danger
- `timestamps`

## API Endpoint untuk IoT Device

### Submit Sensor Data

**POST** `/api/sensor/data`

Request Body:
```json
{
    "room_id": 1,
    "temperature": 25.5,
    "smoke_density": 50.0
}
```

Response:
```json
{
    "success": true,
    "message": "Sensor data stored successfully",
    "data": {
        "id": 1,
        "room_id": 1,
        "temperature": "25.50",
        "smoke_density": "50.00",
        "fire_detected": false,
        "status": "normal",
        "alert_message": null,
        "created_at": "2024-01-01T12:00:00.000000Z"
    },
    "alert": "OK"
}
```

### Get Latest Sensor Data

**GET** `/api/sensor/latest/{roomId}`

Response:
```json
{
    "success": true,
    "data": {
        "id": 1,
        "room_id": 1,
        "temperature": "25.50",
        "smoke_density": "50.00",
        "fire_detected": false,
        "status": "normal",
        "alert_message": null,
        "created_at": "2024-01-01T12:00:00.000000Z"
    }
}
```

## Logika Deteksi Kebakaran

Sistem secara otomatis menentukan status berdasarkan nilai sensor:

### Status: **DANGER** (Kebakaran Terdeteksi)
- Suhu > 60°C **ATAU**
- Kepekatan Asap > 500 ppm

### Status: **WARNING** (Peringatan)
- Suhu > 40°C **ATAU**
- Kepekatan Asap > 200 ppm

### Status: **NORMAL**
- Suhu ≤ 40°C **DAN**
- Kepekatan Asap ≤ 200 ppm

## Cara Menggunakan

1. **Akses Dashboard**
   - Buka browser dan akses `http://localhost:8000/dashboard`
   
2. **Pilih Ruang**
   - Klik pada ruang di sidebar kiri untuk melihat data sensor
   
3. **Monitor Data Real-time**
   - Data akan update otomatis setiap 5 detik
   - Grafik menampilkan 20 data terakhir untuk setiap sensor
   
4. **Kirim Data dari IoT Device**
   - Gunakan endpoint `/api/sensor/data` untuk mengirim data sensor
   - Data akan langsung muncul di dashboard

## Contoh Integrasi IoT Device

### Menggunakan cURL

```bash
curl -X POST http://localhost:8000/api/sensor/data \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "room_id": 1,
    "temperature": 25.5,
    "smoke_density": 50.0
  }'
```

### Menggunakan Arduino/ESP32 (Pseudocode)

```cpp
#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "YOUR_WIFI_SSID";
const char* password = "YOUR_WIFI_PASSWORD";
const char* serverURL = "http://YOUR_SERVER_IP:8000/api/sensor/data";

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverURL);
    http.addHeader("Content-Type", "application/json");
    
    // Read sensor values
    float temperature = readTemperature();
    float smokeDensity = readSmokeSensor();
    
    // Create JSON payload
    String jsonData = "{";
    jsonData += "\"room_id\":1,";
    jsonData += "\"temperature\":" + String(temperature) + ",";
    jsonData += "\"smoke_density\":" + String(smokeDensity);
    jsonData += "}";
    
    int httpResponseCode = http.POST(jsonData);
    
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Response: " + response);
    }
    
    http.end();
  }
  
  delay(5000); // Send data every 5 seconds
}
```

## Struktur File Penting

```
app/
├── Http/
│   └── Controllers/
│       └── Api/
│           └── SensorController.php    # API endpoint untuk IoT
├── Livewire/
│   └── PatientRoomMonitor.php          # Komponen Livewire utama
└── Models/
    ├── Room.php                         # Model Ruang
    └── SensorReading.php                # Model Pembacaan Sensor

database/
├── migrations/
│   ├── create_rooms_table.php
│   └── create_sensor_readings_table.php
└── seeders/
    └── RoomSeeder.php                   # Seeder untuk data sample

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php                # Layout utama dengan Bootstrap 5.3
    ├── livewire/
    │   └── patient-room-monitor.blade.php # View komponen Livewire
    └── dashboard.blade.php              # Dashboard utama
```

## Catatan

- Sistem menggunakan **Livewire polling** untuk update real-time (setiap 5 detik)
- Grafik menampilkan **20 data terakhir** per ruang
- Semua perhitungan status dilakukan secara otomatis di backend
- API endpoint tidak memerlukan autentikasi (untuk development). Tambahkan middleware auth untuk production.

## Troubleshooting

### Grafik tidak muncul
- Pastikan Chart.js sudah ter-load
- Check console browser untuk error JavaScript
- Pastikan data chart tersedia (minimum 1 data point)

### Data tidak update real-time
- Check apakah Livewire polling aktif (wire:poll.5s)
- Pastikan server berjalan dan tidak ada error di log

### API tidak menerima data
- Check CORS settings jika IoT device di domain berbeda
- Pastikan format JSON sesuai dengan yang diharapkan
- Check validation errors di response API

## Lisensi

MIT License

